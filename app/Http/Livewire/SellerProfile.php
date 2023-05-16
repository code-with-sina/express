<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SellingProfile;

class SellerProfile extends Component
{
    public $payment_type, $full_name, $phone_number;

    public function updateSellerProfile(){
        $this->validate([
            'payment_type'  => 'required',
            'full_name'     => 'required',
            'phone_number'  => 'required'
        ]);

        $sellerProfile = new SellingProfile();
        $sellerProfile->seller_id       =   auth()->id();
        $sellerProfile->payment_type    =   $this->payment_type;
        $sellerProfile->full_name       =   $this->full_name;
        $sellerProfile->phone_number    =   $this->phone_number;

        $updateProfile = $sellerProfile->save();

        if($updateProfile){
            $this->showToastr('You have successfully updated your selling profile', 'success');
            $this->resetErrorBag();
            $this->payment_type = null;
            $this->full_name = null;
            $this->phone_number = null;
        }else{
            $this->showToastr('Something went wrong', 'error');
        }

    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }

    public function render()
    {
        $sellerprofile = SellingProfile::where('seller_id', auth()->id())->first();
        if($sellerprofile != null){
            $this->payment_type = $sellerprofile->payment_type;
            $this->full_name = $sellerprofile->full_name;
            $this->phone_number = $sellerprofile->phone_number;
        }
        
        return view('livewire.seller-profile');
    }
}
