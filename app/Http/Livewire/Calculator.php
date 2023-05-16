<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeRate;

class Calculator extends Component
{
    public $rate;
    public $amount;
    public $percentData;
    // public $predefined;

    public $values;

    protected $listeners = [
        'getPercent'
    ];

    public function updated($key, $value){
        if(in_array($key, ['rate'])){
            if($this->rate != ''){
                $newprice = $this->getValue() * ((100 - ($this->percentData == 0 ? $this->percentData = 4.1 : $this->percentData)) / 100);
                $this->amount = intval($this->rate * $newprice);
            }
        }
    }

    public function getValue() {
        $value = ExchangeRate::latest()->first();
        $this->values = $value->rate_normal;
        return $this->values;
    }

    public function moveToSell(){
        $this->emit('sell');
    }

    public function getPercent($percentData){
        $this->percentData = $percentData;
    }

    public function render()
    {
        $value = ExchangeRate::latest()->first();
        return view('livewire.calculator', ['predefined' => $value->rate_normal]);
    }
}
