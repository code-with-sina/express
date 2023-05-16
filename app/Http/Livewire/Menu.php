<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    // public $navigate_exchange;

    public function moveToExchange(){
        $this->emit('exchange');
    }

    public function moveToCalculate(){
        $this->emit('calculate', 0);
    }


    public function moveToSell(){
        $this->emit('sell');
    }

    // public function calculator(){
    //     return view('livewire.calculator-page');
    // }

    public function render()
    {
        return view('livewire.menu');
    }
}
