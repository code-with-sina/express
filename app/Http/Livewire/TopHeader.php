<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;

class TopHeader extends Component
{

    public $author;
    public $notify;

    protected $listeners = [
        'updateTopHeader'   => '$refresh'
    ];

    public function mount(){
        $this->author = User::find(auth('web')->id());
    }
    
    public function render()
    {
        return view('livewire.top-header');
    }
}
