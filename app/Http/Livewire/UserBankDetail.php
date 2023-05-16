<?php

namespace App\Http\Livewire;

use auth;
use Livewire\Component;
use App\Models\BankUser;
use Illuminate\Support\Facades\Http;

class UserBankDetail extends Component
{

    
    public function render()
    {
        $props = BankUser::where('users_id', auth()->user()->id)->get();
        return view('livewire.user-bank-detail', ['props' => $props]);
    }
}
