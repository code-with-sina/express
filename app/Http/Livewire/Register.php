<?php

namespace App\Http\Livewire;

use App\Http\Controllers\FacebookPixelsController;
use App\Models\User;
use App\Mail\Welcome;
use Livewire\Component;
use Nette\Utils\Random;
use App\Mail\Registration;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Register extends Component
{
    public $agree = true;
    public $firstname, $lastname, $email, $username, $users_type, $direct_publisher, $mobile_number, $password, $password_confirmation, $referral_code;


    public function mount()
    {
        if (Session::has('referralEmail')) {
            $this->email = Session::get('referralEmail');
        }

        if (Session::has('referralCode')) {
            $this->referral_code = Session::get('referralCode');
        }
    }
    public function Register()
    {
        $this->validate(
            [
                'firstname'         => 'required|string',
                'lastname'          => 'required|string',
                'email'             => 'required|email|unique:users,email',
                'username'          => 'required|unique:users,username|min:6|max:20',
                'mobile_number'     => 'required|min:11|max:11',
                'password'          => 'required|min:8|confirmed',
                'agree'             => 'required|accepted'
            ],
            [
                'users_type.required'      => 'Chose author type',
                'direct_puplisher.required' => 'Specify another publication access'
            ]
        );

        // if($this->isOnline()){
        $default_emailcode = md5(Hash::make($this->username));
        $uuid                      = Str::uuid()->toString();
        $users                     =   new User();
        $users->name               =   $this->firstname . ' ' . $this->lastname;
        $users->email              =   $this->email;
        $users->username           =   $this->username;
        $users->password           =   Hash::make($this->password);
        $users->type               =   4;
        $users->direct_publish     =   0;
        $users->mobile_number      =   $this->mobile_number;
        $users->emailcode          =   $default_emailcode;
        $users->uuid               =   $uuid;
        $saved  =   $users->save();

        $body = 'You registered an account on ' . env('APP_URL') . ', before being  able to use your account you need to verify that this is your email address by clicking the button bellow';
        $url = "https://ratefy.co/users/activate/" . $default_emailcode;
        $complement = 'Kind Regards';


        if ($saved) {
            if ($this->referral_code !== null) {
                Http::post('https://affiliatebased.ratefy.co/api/subscribe-customer', [
                    "uuid" => $uuid,
                    "email" => $this->email,
                    "code" => $this->referral_code
                ]);
            }
            $user = User::where('email', $this->email)->first();

            Mail::to($user)->send(new Registration($user->name, $url, $body, $complement));
            Mail::to($user)->send(new Welcome($user->name, $url, $body));
            // return redirect()->route('users.home');

            $ipAddress = request()->ip();
            $userAgent = request()->header('User-Agent');

            $trackingData = (object) [

                'ipAddress' => $ipAddress,
                'userAgent' => $userAgent,
                "firstname" => $this->firstname,
                "lastname" => $this->lastname,
                "email" => $this->email,
                'mobile_number' => $this->mobile_number,
                'userId' => $user->id,

            ];
            $facebookTrackingController = new FacebookPixelsController();

            $facebookTrackingController->trackSignUpEvent($trackingData);

            return redirect('/success')->with('success', 'Your account has been successfully created. Kindly check your inbox or spam folder to verify you account.');
        } else {
            $this->showToastr('Somethng went wrong', 'error');
        }

        // }else{
        // $this->showToastr('You are offline. check your internet connection and submit for again later', 'error');
        // }
    }



    public function isOnline($site = "https://youtube.com")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }


    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }


    public function render()
    {
        return view('livewire.register');
    }
}
