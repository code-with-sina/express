<?php

namespace App\Http\Livewire;

use Livewire\Component;

use auth;
use App\Models\User;
use App\Models\BankUser;
use App\Models\AnchorBankList;
use App\Models\CounterPartyAccount;
use Illuminate\Support\Facades\Http;

class NewUserBankForm extends Component
{

    public $users;
    public $bank_name, $account_name, $account_number, $bank_code, $user_id;

    public function verifyOld()
    {
        $splitName = array();
        $bankData = explode(" ", $this->bank_name, 2);
        $lastName = explode(" ", auth()->user()->name, 2);
        $firstName = explode(" ", auth()->user()->name);

        $verifyBank = Http::withHeaders([
            'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->get('https://api.paystack.co/bank/resolve?account_number='.$this->account_number.'&bank_code='.$bankData[0]);

        $detail = $verifyBank->json();
        if($detail['status'] == 'true'){
            $add        =   new BankUser();
            $splitName = explode(" ", strtolower($detail['data']['account_name']));

            if(in_array(strtolower($lastName[1]), $splitName)){
                //dd(in_array(strtolower($lastName[1]), $splitName), $splitName, $lastName, $firstName[0], $firstName[1]);
                $add->users_id          =   auth('web')->id();
                $add->bank_name         =   $bankData[1];
                $add->account_name      =   $detail['data']['account_name'];
                $add->account_number    =   $detail['data']['account_number'];
                $add->code              =   $bankData[0];
                $add->bank_id           =   $detail['data']['bank_id'];
                $add->save();
                return redirect('users/bank')->with('error', "Account added successfully");
            }elseif(in_array(strtolower($firstName[0]), $splitName)) {
                $add->users_id          =   auth('web')->id();
                $add->bank_name         =   $bankData[1];
                $add->account_name      =   $detail['data']['account_name'];
                $add->account_number    =   $detail['data']['account_number'];
                $add->code              =   $bankData[0];
                $add->bank_id           =   $detail['data']['bank_id'];
                $add->save();
                return redirect('users/bank')->with('error', "Account added successfully");
            }elseif(in_array(strtolower($firstName[1]), $splitName)) {
                $add->users_id          =   auth('web')->id();
                $add->bank_name         =   $bankData[1];
                $add->account_name      =   $detail['data']['account_name'];
                $add->account_number    =   $detail['data']['account_number'];
                $add->code              =   $bankData[0];
                $add->bank_id           =   $detail['data']['bank_id'];
                $add->save();
                return redirect('users/bank')->with('error', "Account added successfully");
                
            }else {
                return redirect('users/bank')->with('error', "Your Names do not match your account number");
            }
        }else{
            return redirect('users/bank')->with('error', $detail['message']);
        }
        
    }

    public function verify() {
        $splitName = array();
        $bankData = explode(" ", $this->bank_name, 2);

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80'
            ])->get('https://api.getanchor.co/api/v1/payments/verify-account/'.$bankData[1].'/'.$this->account_number.'?include=DepositAccount%2CIndividualCustomer%2CBusinessCustomer');
        
        $filters = $response->object();
        // $splitName = explode(" ", strtolower($filters->data->attributes->accountName));
        $payload = [
            "data"  => [
                'type'          => 'CounterParty',
                'attributes'    => [
                    "verifyName"    => true,
                    "accountName" => $filters->data->attributes->accountName,
                    "accountNumber" =>  $filters->data->attributes->accountNumber,
                    "bankCode" => $filters->data->attributes->bank->nipCode
                ],
                "relationships"     => [
                        "bank"          => [
                                "data"      => [
                                    "id"    =>  $bankData[0],
                                    "type"  => "bank"
                                ]
                        ]
                ]
            ]
        ];

         return $this->createCounterParty($payload);
    }


    public function createCounterParty($payload) {
        
        $counterPartyAccount = [];

        $response = Http::withHeaders([
                'accept' => 'application/json',
                'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                'Content-Type' => 'application/json'
                ])->post('https://api.getanchor.co/api/v1/counterparties', $payload);
        $mapper = $response->object();
     
        $createAccount = new CounterPartyAccount();


        $createAccount->uuid                = $mapper->data->id;
        $createAccount->type                = $mapper->data->type;
        $createAccount->anchor_created_at   = $mapper->data->attributes->createdAt;
        $createAccount->bank_id             = $mapper->data->attributes->bank->id;
        $createAccount->bank_name           = $mapper->data->attributes->bank->name;
        $createAccount->bank_nipcode        = $mapper->data->attributes->bank->nipCode;
        $createAccount->account_name        = $mapper->data->attributes->accountName;
        $createAccount->account_number      = $mapper->data->attributes->accountNumber;
        $createAccount->anchor_updated_at   = $mapper->data->attributes->updatedAt;
        $createAccount->status              = $mapper->data->attributes->status;
        $createAccount->users_id            = $this->user_id;
        
        $createAccount->save();
        return redirect('users/upcoming')->with('error', "Account added successfully");
    }

    public function getBank(){
        $getBank = AnchorBankList::all();
        return $getBank;
    }
    
    public function render()
    {
        return view('livewire.new-user-bank-form', ['banks' => $this->getBank()]);
    }
}
