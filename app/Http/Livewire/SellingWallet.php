<?php

namespace App\Http\Livewire;

use auth;
use App\Models\Buying;
use Livewire\Component;
use App\Models\Transaction;

class SellingWallet extends Component
{

    public $sellings;
    public $amount;
    public $buying_id;
    public $gesture;
    public $wallets;

    public function mount(){
        $this->sellings = Buying::all();
    }

    public function selling(){
        $this->validate([
            'amount'        => 'required',
        ]);
        dd($this->callData());
        $sell = new Transaction();
        $sell->users_id         = auth('web')->id();
        $sell->seller_id        = $this->buying_id;
        $sell->amount           = $this->amount;
        $sell->amount_release   = $this->amount;
        $sell->selling          = $this->wallets;
        
        if($sell->save()){
            $this->showToastr('Wait selling processing.', 'success');
        }else{
            $this->showToastr('Something went wrong', 'error');
        }
        
    }

    public function callData(){
        echo $wallets, $sellers;
    }
    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    } 

    public function render()
    {
        return view('livewire.selling-wallet');
    }
}
