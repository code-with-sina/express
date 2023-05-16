<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SellAnnouncement as Announcement;

class SellerAnnouncement extends Component
{
    public $subject, $amount, $description;

    public function postAnouncement(){
        $this->validate([
            'subject'       => 'required',
            'amount'        => 'required',
            'description'   => 'required'
        ]);

        $post = new Announcement();
        $post->subject      = $this->subject;
        $post->amount       = $this->amount;
        $post->description  = $this->description;
        $announcement = $post->save();

        if($announcement){
            $this->showToastr('Your announcement has been made', 'success');
            $this->resetErrorBag();
            $this->subject = null;
            $this->amount = null;
            $this->description = null;
        }else{
            $this->showToastr('Something went wrong', 'error');
        }
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }


    public function render()
    {
        return view('livewire.seller-announcement');
    }
}
