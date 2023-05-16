<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class UsersForgot extends Component
{
    public $email;
    public function ForgotHandler(){
        $this->validate(
            [
                'email' =>  'required|email|exists:users,email'
            ],
            [
                'email.required'    => 'The :attribute is required',
                'emai.email'        => 'invalid email address',
                'email.exists'      => 'The :attribute is not registered'
            ]
        );

        $token = \base64_encode(Str::random(64));
        DB::table('password_resets')->insert([
            'email'         => $this->email,
            'token'         => $token,
            'created_at'    => Carbon::now()
        ]);

        $user = User::where('email', $this->email)->first();
        $link = route('users.reset-form',['token' => $token, 'email' => $this->email]);
        $body_message = "We have received a message to reset your password for <b>Ratefy</b> account associated with ".$this->email."
         <br> You can reset the password by clicking the button bellow";
        $body_message .= "<br>";
        $body_message .= '<a href="'.$link.'" target="_blank" style="color:#fff; border-color:#22bc66; border-style:solid; border-width:10px 100px;
        background-color:#22bc66; display:inline-block; text-decoration:none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0,0,0,16); 
        webkit-text-size-adjust:none; "> Reset Password</a>';
        $body_message .= '<br>';
        $body_message .= 'If you did not request for a password reset, please ignore the mail';
        
        $data = array(
            'name'          => $user->name,
            'body_message'  => $body_message
        );

    

        Mail::to($user)->send(new PasswordReset( $user->name, $link, $user->meail));
        $this->email = null;
        session()->flash('success', 'we have emailed your password reset link');

        // Mail::send('forgot-email-temmplate', $data, function($message) use ($user){
        //     $message->from('no-reply@ratefy.co', 'Ratefy');
        //     $message->to($user->email, $user->username)->subject('Reset Password');

        //     $this->email = null;
        //     session()->flash('success', 'we have emailed your password reset link');
        // });
    }

    
    public function render()
    {
        return view('livewire.users-forgot');
    }
}
