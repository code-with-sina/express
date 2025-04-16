<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeRate;
use App\Models\SellAnnouncement as Announcement;

class SellerAnnouncement extends Component
{
    public $rate_decimal, $rateid;

    public function mount()
    {
        $therate = $this->getEditatbleExchangeRate();
        $this->rateid = $therate->id;
    }
    public function postAnouncement(){
        $announcement = false;
        $this->validate([
            'rate_decimal'       => 'required',
        ]);

        ExchangeRate::where('id', $this->rateid)->update([
            'rate_normal' => $this->rate_decimal,
            'rate_decimal' => $this->rate_decimal
        ]);
        $announcement = true;

        if($announcement){
            $this->showToastr('Your Rate has been changed', 'success');
            $this->resetErrorBag();
            $this->rate_decimal = null;
        }else{
            $this->showToastr('Something went wrong', 'error');
        }
    }

    public function getEditatbleExchangeRate() 
    {
        $rate = ExchangeRate::latest()->first();
        return $rate;
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }


    public function render()
    {
        $lastrate = $this->getEditatbleExchangeRate();
        return view('livewire.seller-announcement', ['lastrate' => $lastrate]);
    }
}
