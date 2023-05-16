<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeItem;
use Livewire\WithPagination;

class ExchangeRate extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    } 


    public function moveToCalculate($rate){
        $this->emit('calculate', $rate);
    }

    public function render()
    {
        return view('livewire.exchange-rate', ['props' => ExchangeItem::where('item', 'like', '%'.$this->search.'%')->where('active', 1)->orderBy('ordering', 'asc')->paginate(15)]);
    }
}
