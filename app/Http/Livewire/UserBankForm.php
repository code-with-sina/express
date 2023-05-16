<?php

namespace App\Http\Livewire;

use auth;
use App\Models\User;
use Livewire\Component;
use App\Models\BankUser;
use Illuminate\Support\Facades\Http;

class UserBankForm extends Component
{

    public $users;
    public $bank_name, $account_name, $account_number, $bank_code;

    public function verify()
    {
        $bankData = explode(" ", $this->bank_name, 2);
 
        $verifyBank = Http::withHeaders([
            'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->get('https://api.paystack.co/bank/resolve?account_number='.$this->account_number.'&bank_code='.$bankData[0]);

        $detail = $verifyBank->json();
        if($detail['status'] == 'true'){
            $add        =   new BankUser();
            $add->users_id          =   auth('web')->id();
            $add->bank_name         =   $bankData[1];
            $add->account_name      =   $detail['data']['account_name'];
            $add->account_number    =   $detail['data']['account_number'];
            $add->code              =   $bankData[0];
            $add->bank_id           =   $detail['data']['bank_id'];
            $add->save();

        return redirect('users/bank');

        }else{
            return redirect('users/bank')->with('error', $detail['message']);
        }
        
    }

    public function getBank(){
        $getBank = Http::withHeaders([
            'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->get('https://api.paystack.co/bank?currency=NGN');
        return $getBank;
    }
    

    public function render()
    {
        return view('livewire.user-bank-form', ['banks' => $this->getBank()]);
    }
}
