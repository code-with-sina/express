<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\PasswordResetSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersResetForm extends Component
{
    public $email, $token, $new_password, $confirm_new_password;

    public function mount(){
        $this->email = request()->email;
        $this->token = request()->token;
    }

    public function ResetHandler(){
        $this->validate(
            [
                'email'             => 'required|email|exists:users,email',
                'new_password'      => 'required|min:5',
                'confirm_new_password'  => 'same:new_password'
            ],
            [
                'email.required'                => 'The email feild is required',
                'email.email'                   => 'Invalid email address',
                'email.exists'                  => 'This email is not registered',
                'new_password.required'         => 'Enter new password',
                'new_password.min'              => 'Minimum character must be 5',
                'confirm_new_password'          => 'The passwords must match'
            ]
        );
        
        $check_token = DB::table('password_resets')->where([
            'email'     => $this->email,
            'token'     => $this->token
        ])->first();

        if(!$check_token){
            session()->flash('fail', 'Invalid Token.');
        }else{
            User::where('email', $this->email)->update([
                'password'  =>  Hash::make($this->new_password)
            ]);

            DB::table('password_resets')->where([
                'email' => $this->email
            ])->delete();

            $success_token = Str::random(64);
            $users = User::where('email', $this->email)->first();
            session()->flash('success', 'Your password has been updated sucessfully. Login with your email and your new password');
            Mail::to($users)->send(new PasswordResetSuccess($users->name));
            $this->redirectRoute('users.login', ['tkn' => $success_token, 'email' => $this->email]);
        }
    }
    public function render()
    {
        return view('livewire.users-reset-form');
    }
}
