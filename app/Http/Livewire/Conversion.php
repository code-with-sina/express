<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class Conversion extends Component
{
    use WithPagination;
    
    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }
   
    public function render()
    {
        $newproperties = ExchangeRate::orderBy('id', 'desc')->paginate(5);
        return view('livewire.conversion', ['new_properties' => $newproperties]);
    }
}
