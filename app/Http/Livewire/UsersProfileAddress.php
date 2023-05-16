<?php

namespace App\Http\Livewire;

use auth;
use Livewire\Component;
use App\Models\UserProfileAddress as UserAddress;


class UsersProfileAddress extends Component
{
    public function render()
    {
        $props = UserAddress::where('users_id', auth()->user()->id)->first();
        return view('livewire.users-profile-address', ['props' => $props]);
    }
}
