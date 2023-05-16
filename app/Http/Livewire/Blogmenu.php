<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Blogmenu extends Component
{
    // public $navigate_exchange;

    public function moveToExchange(){
         return redirect()->to('/');
    }

    public function moveToCalculate(){
        return redirect()->to('/');
    }


    public function moveToSell(){
       return redirect()->to('/');
    }

    // public function calculator(){
    //     return view('livewire.calculator-page');
    // }

    public function render()
    {
        return view('livewire.blogmenu');
    }
}