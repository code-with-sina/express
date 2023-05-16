<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotifyMenu extends Component
{

    public function moveToSellerNotification(){
        $this->emit('notification');
    }

    public function render()
    {
        return view('livewire.notify-menu');
    }
}
