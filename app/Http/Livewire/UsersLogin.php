<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Nette\Utils\Random;
use App\Mail\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UsersLogin extends Component
{
    public $login_id, $password;
    public $returnUrl;

    public function mount(){
        $this->returnUrl    =   request()->returnUrl;
    } 

    public function  UsersLoginHandler(){
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if($fieldType == 'email'){
            $this->validate(
                [
                    'login_id' => 'required|email|exists:users,email',
                    'password' => 'required|min:5' 
                ],
                [
                    'login_id'           => 'Email or Username is required',
                    'login_id.email'     => 'Invalid email address',
                    'login_id.exists'    => 'Email is not registered',
                    'password.required'  => 'password is required'
                ]
            );
        }else{
            $this->validate(
                [
                    'login_id'  => 'required|exists:users,username',
                    'password'  => 'required|min:5'
                ],
                [
                    'login_id.required'     => 'Email or Username is required',
                    'login_id.exists'       => 'Username is not registered',
                    'password.required'     => 'Password is required'    
                ]
            );
        }

        $creds = array($fieldType=>$this->login_id, 'password' => $this->password);

        if( Auth::guard('web')->attempt($creds)){
            $checkuser = User::where($fieldType, $this->login_id)->first();
            if($checkuser->blocked == 1){
                
                Auth::guard('web')->logout();
                return redirect()->route('users.login')->with('fail', 'Your account has been blocked');
            }else{
                if($checkuser->activate < 1){

                    $default_emailcode = md5(Hash::make($checkuser->username));
                    User::where('id', $checkuser->id)->update(['emailcode' => $default_emailcode]);
                    $body = 'You registered an account on '. env('APP_URL').', before being  able to use your account you need to verify that this is your email address by clicking the button bellow';
                    $url = "https://ratefy.co/users/activate/".$default_emailcode;
                    $complement = 'Kind Regards';

                    Mail::to($checkuser)->send(new Registration($checkuser->name, $url, $body, $complement));

                    Auth::guard('web')->logout();
                    return redirect()->route('users.login')->with('fail', 'Your account is not activated yet and a link to activate it has been resent. Kindly check your email to activate your account');
                }else{
                     if($this->returnUrl != null){
                        return redirect()->to($this->returnUrl);
                    }else{
                        return redirect()->route('users.home');
                    }   
                }
                
                
            }
        }else{
            session()->flash('fail', 'Incorrect Email | Username or password');
        }
    }


    public function render()
    {
        return view('livewire.users-login');
    }
}
