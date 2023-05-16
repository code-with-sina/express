<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BankUser;

class UserBankDetailEdit extends Component
{
    public $users;
    public $bank_name, $account_name, $account_number;
    public $param;

    public function mount(){
        $this->param = request()->input('id');
        $this->users = BankUser::where('id', request()->input('id'))->first();
        $this->bank_name = $this->users->bank_name ?? 'Not set';
        $this->account_name = $this->users->account_name ?? 'Not set';
        $this->account_number = $this->users->account_number ?? 'Not set';     
    }

    

    public function Action(){
        $this->validate([
            'bank_name'         => 'required|string',
            'account_number'    => 'required|string',
        ]);
       dd( auth()->user()->id, request()->input('id'), BankUser::where('users_id', auth()->user()->id)->where('id', $this->param)->update([
            'bank_name'             => $this->bank_name,
            'account_number'        => $this->account_number
        ]));
    }

    public function render()
    {
        return view('livewire.user-bank-detail-edit');
    }
}
