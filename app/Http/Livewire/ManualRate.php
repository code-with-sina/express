<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\ManualRate as ManuallyRate;

class ManualRate extends Component
{
    public $rate;
    public function createRate() {
        ManuallyRate::create([
            'rate_normal'      =>   $this->rate,
            'rate_decimal'     =>   $this->rate,
            'assets_id_from'   =>   'USDT',
            'assets_id_to'     =>   'NGN',
            'exchange_time'    =>   Carbon::now(),
            'status'           =>   2,
        ]);
    }
    public function render()
    {
        $formerRate = ManuallyRate::latest()->first();
        return view('livewire.manual-rate', ['former_rate' => $formerRate]);
    }
}
