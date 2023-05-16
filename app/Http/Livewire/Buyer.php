<?php

namespace App\Http\Livewire;

use auth;
use App\Models\Buying;
use Livewire\Component;
use App\Models\ExchangeItem;
use App\Models\SellingProfile;

class Buyer extends Component
{
    public $wallets;
    public $buyer_id;
    public $wallet_type;
    public $currency;
    public $amount;
    public $availability;
    public $notetoseller;

    public function mount(){
        $this->wallets = ExchangeItem::all();
        $this->buyer_id =    SellingProfile::where('seller_id', auth('web')->id())->first();
    }

    public function QeueBuy(){
        $this->validate([
            'wallet_type'       => 'required',
            'availability'      => 'required',
            'amount'            => 'required',
            'currency'          => 'required',
            'notetoseller'      => 'required'
        ]);

        $queueBuy   =    new Buying();
        $queueBuy->selling_id   =       $this->buyer_id->id;
        $queueBuy->seller_id    =       auth('web')->id();
        $queueBuy->wallets      =       $this->wallet_type;
        $queueBuy->available    =       $this->availability == 'on' ? 1 : 0;
        $queueBuy->capacity     =       $this->amount;
        $queueBuy->currency     =       $this->currency;
        $queueBuy->note         =       $this->notetoseller;
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
        return view('livewire.buyer');
    }
}
