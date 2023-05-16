<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoverPage extends Component
{
    public $percentData = 0;
    public $showPage = 0;

    protected $listeners = [
        'exchange',
        'calculate',
        'sell',
        'notification'
    ];


    public function exchange(){
        $this->showPage = 1;
    }

    public function calculate($percentData){
        if($percentData != null || $percentData != 0 || $percentData != ''){
            $this->emit('getPercent', $percentData);
        }else{
            $this->emit('getPercent'); 
        }
       
        $this->showPage = 2;
    }

    public function sell(){
        $this->showPage = 3;
    }

    public function notification(){
        $this->showPage = 4;
    }
    public function render()
    {
        return view('livewire.cover-page');
    }
}
