<?php

namespace App\Http\Livewire;

use auth;
use Livewire\Component;
use App\Models\ExchangeItem;
// use App\Models\Buying;

class Buying extends Component
{
    public $wallets;
    public $wallet_type;
    public $currency;
    public $amount;
    public $availability;

    public function mount(){
        $this->wallets = ExchangeItem::all();
    }

    public function QeueBuy(){
        $this->validate([
            'wallet_type'       => 'required',
            'availability'      => 'required',
            'currency'          => 'required',
            'amount'            => 'nullable',
            'currency'          => 'nullable'
        ]);

        $queueBuy   =    new Buying();
        $queueBuy->selling_id   =    auth('web')->id();
        $queueBuy->wallets      =   $this->wallet_type;
        $queueBuy->available    =   $this->availability == 'on' ? 1 : 0;
        $queueBuy->capacity     =   $this->amount;
        $queueBuy->currency     =   $this->currency;
        dd($queueBuy->save());
        $isSaved  = $queueBuy->save();

        if($isSaved){
            $this->showToastr('Your Buyings has been queued', 'success');
        }else{
            $this->showToastr('Oops, something went wrong', 'error');
        }
    }

    public function showToastr($message, $type){

        return $this->dispatchBrowserEvent('showToastr', 
        [
            'type'      => $type, 
            'message'   => $message
        ]);
    }

    public function render()
    {
        return view('livewire.buying');
    }
}
