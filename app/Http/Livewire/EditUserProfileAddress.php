<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserProfileAddress;

class EditUserProfileAddress extends Component
{
    public $user;
    public $first_address, $landmark, $city, $postal_code, $country, $state;

    public function mount(){
        $this->user             = UserProfileAddress::where('users_id', auth()->user()->id)->first();
        $this->first_address    = $this->user->first_address ?? '';
        $this->landmark         = $this->user->landmark ?? '';
        $this->city             = $this->user->city ?? '';
        $this->postal_code      = $this->user->postal_code ?? '';
        $this->country          = $this->user->country ?? '';
        $this->state            = $this->user->state ?? '';
    }

    public function UpdateAddressDetails()
    {
        $this->validate([
            'first_address'     => 'required',
            'city'              => 'required',
            'postal_code'       => 'required|numeric',
            'country'           => 'required',
            'state'             => 'required'
        ]);

        $assignment = UserProfileAddress::where('users_id', auth()->user()->id)->first();
        
        if($assignment !== null){
            UserProfileAddress::where('users_id', auth()->user()->id)->update([
                'first_address'     => $this->first_address,
                'landmark'          => $this->landmark ?? null,
                'city'              => $this->city,
                'postal_code'       => $this->postal_code,
                'country'           => $this->country,
                'state'             => $this->state
            ]);
            return redirect('users/profile');
        }else{
        
            $profile = new UserProfileAddress();
            
            $profile->users_id = auth()->user()->id;
            $profile->first_address = $this->first_address;
            $profile->landmark = $this->landmark ?? null;
            $profile->city = $this->city;
            $profile->postal_code = $this->postal_code;
            $profile->country = $this->country;
            $profile->state     = $this->state;
            
            $saved = $profile->save();

            
            return redirect('users/profile');
        }
    }

    public function render()
    {
        return view('livewire.edit-user-profile-address');
    }
}
