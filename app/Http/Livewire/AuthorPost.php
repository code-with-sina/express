<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorPost extends Component
{
    use WithPagination;
    public $perPage = 1;
    public $search      = null;
    public $category    = null;
    public $author      = null;
    public $orderBy     = 'desc';
    public function render()
    {
        return view('livewire.author-post',  [
            'posts' =>  Post::where('author_id', auth()->id())->paginate($this->perPage)
        ]);
    }
}
