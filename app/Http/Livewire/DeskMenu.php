<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeskMenu extends Component
{
    public $cssMenu = 0;

    public function moveToExchanges(){
        $this->cssMenu = 0;
        $this->emit('exchange');
    }

    public function moveToCalculates(){
        $this->cssMenu = 1;
        $this->emit('calculate', 0);
    }


    public function moveToSells(){
        $this->cssMenu = 2;
        $this->emit('sell');
    }


    public function render()
    {
        return view('livewire.desk-menu');
    }
}
