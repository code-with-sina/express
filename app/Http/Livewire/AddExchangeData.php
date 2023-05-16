<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeItem;
use Livewire\WithFileUploads;

class AddExchangeData extends Component
{
    use WithFileUploads;
    public $name, $percent, $exchange_image;

    public function  addExchangeData() {
        $this->validate([
            'exchange_image'     => 'required|image|mimes:jpeg,jpg,png|max:1024',
            'name'      => 'required',
            'percent'   => 'required|numeric'
        ]);

        if($this->exchange_image->hasFile('exchange_image')){
            $path       =   "/images/exchange_images/";
            $file       =   $this->exchange_image->file('exchange_image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string)file_get_contents($file));

            $post_thumbnail_path = $path.'thumbnails';

            if( !Storage::disk('public')->exists($post_thumbnail_path)){
                Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
            }   

            Image::make( storage_path('app/public/'.$path.$new_filename))
                                ->fit(200, 200)
                                ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));

            $addData = new ExchangeItem();

            $addData->item          = $this->name;
            $addData->percntage       = $this->percent;
            $addData->active        = 1;

            $isSaved = $addData->save();

            if($isSaved){
                $this->showToastr('Payment option has been successfully added', 'success');
            }else{
                $this->showToastr('Oops, something went wrong', 'error');
            }
        }

        
    }

    public function showToastr($message, $type){

        return $this->dispatchBrowserEvent('showToastr', 
        [
            'type'      => $type, 
            'message'   => $message
        ]);
    }
    public function render()
    {
        return view('livewire.add-exchange-data');
    }
}
