<?php

namespace App\Http\Livewire;

use auth;
use App\Models\User;
use Livewire\Component;
use App\Models\AnchorBankList;
use App\Models\CounterPartyAccount;
use Illuminate\Support\Facades\Http;

class UserBankForm extends Component
{

    public $users;
    public $bank_name, $account_name, $account_number, $bank_code;

    public function verify() {
        $splitName = array();
        $bankData = explode(" ", $this->bank_name, 2);
        $lastName = explode(" ", auth()->user()->name, 2);
        $firstName = explode(" ", auth()->user()->name);

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80'
            ])->get('https://api.getanchor.co/api/v1/payments/verify-account/'.$bankData[1].'/'.$this->account_number.'?include=DepositAccount%2CIndividualCustomer%2CBusinessCustomer');

        if($response->status() == 200){
            $filters = $response->object();
            $payload = $this->payloader($filters, $bankData[0]);
        
            $splitName = explode(" ", strtolower($filters->data->attributes->accountName));
            $check = CounterPartyAccount::where('account_number', $filters->data->attributes->accountNumber)
                                        ->where('bank_nipcode', $filters->data->attributes->bank->nipCode)->first();
            
            if($check !== null){
                return redirect('users/bank')->with('error', "Your account number already exist");
            }else {
                if(in_array(strtolower($lastName[1]), $splitName)){
                    return $this->createCounterParty($payload);
                }elseif(in_array(strtolower($firstName[0]), $splitName)) {
                    return $this->createCounterParty($payload);
                }else {
                    return redirect('users/bank')->with('error', "Your Names do not match your account number");
                }
            }
        }else {
            $filters = $response->object();
            return redirect('users/bank')->with('error', $filters->errors[0]->detail);
        }   
    }

    public function payloader($filters, $bankData) {
        return $payload = [
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
                                    "id"    =>  $bankData,
                                    "type"  => "bank"
                                ]
                        ]
                ]
            ]
        ];
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
        $createAccount->users_id            = auth()->user()->id;
        
        $createAccount->save();
        return redirect('users/bank')->with('error', "Account added successfully");
    }

    public function getBank(){
        $getBank = AnchorBankList::all();
        return $getBank;
    }
    
    public function render()
    {
        return view('livewire.user-bank-form', ['banks' => $this->getBank()]);
    }
}
