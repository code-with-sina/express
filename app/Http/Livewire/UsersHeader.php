<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersHeader extends Component
{
    public $users;

    protected $listeners = [
        'updateTopHeader'   => '$refresh'
    ];

    public function mount(){
        $this->users = User::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.users-header');
    }
}
