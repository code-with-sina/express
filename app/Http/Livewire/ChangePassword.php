<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\ChangedPasswordAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $confirm_password;

    public function changePassword()
    {
        $this->validate(
            [
                'current_password'             => 'required',
                'password'      => 'required',
                'confirm_password'  => 'same:confirm_password'
            ],
            [
                'confirm_password.required'         => 'Enter new password',
                'confirm_password.min'              => 'Minimum character must be 5',
                'confirm_password'          => 'The passwords must match'
            ]
            );

        if(Auth::attempt(['email' => auth()->user()->email, 'password' => $this->current_password])){
            if($this->password == $this->confirm_password){
                $newPassword = Hash::make($this->password);
                User::where('id', auth()->user()->id)->update(['password' =>  $newPassword]);
                $users = User::find(auth()->user()->id);
                Mail::to($users)->send(new ChangedPasswordAlert(auth()->user()->name));
            }
        }else {
            dd((Auth::attempt(['email' => auth()->user()->email, 'password' => $this->current_password])));
        }
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
