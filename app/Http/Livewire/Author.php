<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Nette\Utils\Random;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class Author extends Component
{
    use WithPagination;
    public $name, $email, $username, $author_type, $direct_publisher;
    public $search;
    public $perPage = 12;
    public $selected_author_id;
    public $blocked = 0;

    protected $listeners = ['resetForms', 'deleteAuthorAction'];

    public function resetForms(){
        $this->name  = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
        $this->resetErrorBag();
    }


    public function mount(){
        $this->resetPage();
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type, 
            'message'   => $message
        ]);
    }
    


    public function deleteAuthor($author){
        $this->dispatchBrowserEvent('deleteAuthor', 
        [
            'title' => 'Are your sure!',
            'html'  => 'You want to delete this: <br/> <b> '.($this->getType($author['type'])).'</b> <br> <b>'.$author['name'].'</b>',
            'id'    => $author['id'],
        ]);
    }

    public function deleteAuthorAction($id){
        // dd('Yes delete:', $id);
        $author             = User::find($id);
        $path               = 'back/dist/img/authors';
        $author_picture     = $author->getAttributes()['picture'];
        $picture_full_path  = $path.$author_picture;

        if($author_picture != null || File::exists(public_path($picture_full_path))){
            File::delete(public_path($picture_full_path));
        }

        $author->delete();
        $type =  Type::find($author['type']);
        $this->showToastr('This '.$type->name.' has been successfully deleted', 'info');
    }
    public function getType($types){
       $type =  Type::find($types);
       return $type->name;
    }
    public function editAuthor($author){
        $this->selected_author_id   = $author['id'];
        $this->name                 = $author['name'];
        $this->email                = $author['email'];
        $this->username             = $author['username'];
        $this->author_type          = $author['type'];
        $this->direct_publisher     = $author['direct_publish'];
        $this->blocked              = $author['blocked'];
        $this->dispatchBrowserEvent('showEditAuthorModal');
    }

    public function updateAuthor(){
        
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$this->selected_author_id,
            'username'  => 'required|min:6|max:20|unique:users,username,'.$this->selected_author_id
        ]);

        if($this->selected_author_id){
            $author = User::find($this->selected_author_id);
            $author->update([
                'name'              => $this->name, 
                'email'             => $this->email,
                'username'          => $this->username,
                'type'              => $this->author_type,
                'blocked'             => $this->blocked,
                'direct_publish'    => $this->direct_publisher,
            ]);

            $this->showToastr('Author details have been successfully updated.', 'success');
            $this->dispatchBrowserEvent('hide_edit_author_modal');

        }
    }

    public function addAuthor(){
        $this->validate(
            [
                'name'              => 'required',
                'email'             => 'required|email|unique:users,email',
                'username'          => 'required|unique:users,username|min:6|max:20',
                'author_type'       => 'required',
                'direct_publisher'  => 'required'
            ],
            [
                'author_type.required'      => 'Chose author type',
                'direct_puplisher.required' => 'Specify another publication access'
            ]
        );

        $default_password           = Random::generate(8);
        $author                     =   new User();
        $author->name               =   $this->name;
        $author->email              =   $this->email;
        $author->username           =   $this->username;
        $author->password           =   Hash::make($default_password);
        $author->type               =   $this->author_type;
        $author->direct_publish     =   $this->direct_publisher;
        $saved  =   $author->save();

        $data = array(
            'name'      =>  $this->name,
            'email'     =>  $this->email,
            'username'  =>  $this->username,
            'password'  =>  $default_password,
            'url'       =>  route('author.profile'),
        );

        $author_email   =   $this->email;
        $author_name    =   $this->name;
        
        if($saved){
            Mail::send('new-author-email-template', $data, function($message) use ($author_email, $author_name) {
                $message->from('no-reply@ratefy.co', 'Ratefy.co');
                $message->to($author_email, $author_name)->subject('Account creation');
            });

            $this->showToastr('New author has been added to blog.', 'success');
            $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
            $this->dispatchBrowserEvent('hide_add_author_modal');
        }else{
            $this->showToastr('Somethng went wrong', 'error');
        }

        
    }

    public function render()
    {
        return view('livewire.author', ['authors' => User::search(trim($this->search))
                                                            ->where('id', '!=', auth('web')->id())->paginate($this->perPage)]);
    }
}
