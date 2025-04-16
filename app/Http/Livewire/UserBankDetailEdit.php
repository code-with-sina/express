<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnchorBankList;
use App\Models\CounterPartyAccount;
use Illuminate\Support\Facades\Http;

class UserBankDetailEdit extends Component
{
    public $users;
    public $bank_name;
    public $account_name, $account_number;
    public $banklist;
    public $param;

    public function mount(){
        $this->param = request()->input('id');
        $this->users = CounterPartyAccount::where('id', request()->input('id'))->first();
        $this->banklist = AnchorBankList::all();
        $this->bank_name = $this->users->bank_id.' '.$this->users->bank_nipcode;
        $this->account_name = $this->users->account_name ?? 'Not set';
        $this->account_number = $this->users->account_number ?? 'Not set';     
    }

    

    public function Action(){
        $this->validate([
            'bank_name'         => 'required',
            'account_number'    => 'required|string',
        ]);

        $splitName = array();

        $bankData = explode(" ", $this->bank_name, 2);
        $lastName = explode(" ", auth()->user()->name, 2);
        $firstName = explode(" ", auth()->user()->name);
      

        $check = CounterPartyAccount::where('account_number', $this->account_number)
        ->where('bank_name', $this->bank_name)->first();

        if($check == null){
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80'
                ])->get('https://api.getanchor.co/api/v1/payments/verify-account/'.$bankData[1].'/'.$this->account_number.'?include=DepositAccount%2CIndividualCustomer%2CBusinessCustomer');

            $getResponse = $response->status() == 404 ? $response->object() : $response->object() ;
            
            if($response->status() == 404){
                
                return back()->with('error', $getResponse->errors[0]->detail); 
            }else{
                
                $maps = CounterPartyAccount::where('account_number', $getResponse->data->attributes->accountNumber)
                ->where('bank_nipcode', $getResponse->data->attributes->bank->nipCode)->first();
            if($maps !== null){
                    return back()->with('error', "This account number already exist");
                }else {
                    $splitName = explode(" ", strtolower($getResponse->data->attributes->accountName));
                    if(in_array(strtolower($lastName[1]), $splitName)){
                        $payload = $this->payloader($getResponse, $bankData[0]);
                        return $this->createCounterParty($payload);
                   }elseif(in_array(strtolower($firstName[0]), $splitName)) {
                    $payload = $this->payloader($getResponse, $bankData[0]);
                       return $this->createCounterParty($payload);
                   }else {
                       return back()->with('error', "Your Names do not match your account number");
                   }
                }    

            }
        }else{
            return back()->with('error', "This account number already exist");
        }
        
        
    }

    public function payloader($getResponse, $bankData) {
        return $payload = [
            "data"  => [
                'type'          => 'CounterParty',
                'attributes'    => [
                    "verifyName"    => true,
                    "accountName" => $getResponse->data->attributes->accountName,
                    "accountNumber" =>  $getResponse->data->attributes->accountNumber,
                    "bankCode" => $getResponse->data->attributes->bank->nipCode
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
        
        $status = $this->deleteFromBoth($payload);
        if($status == true){
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

        
    }

    public function deleteFromBoth($payload) {
 
        $delete = CounterPartyAccount::where('uuid', $this->users->uuid)->delete();
        if($delete){
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                'Content-Type' => 'application/json'
                ])->delete('https://api.getanchor.co/api/v1/counterparties/'.$this->users->uuid);
                
            if($response->status() == 200 ){
                return true;
            }else {
                return false;
            }   
        }else {
            return false;
        }
    }

    public function render()
    {
        return view('livewire.user-bank-detail-edit');
    }
}
