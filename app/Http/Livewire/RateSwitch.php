<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RateSwitch as SwitchRate;

class RateSwitch extends Component
{
    public function swithRate() {
        $status = SwitchRate::latest()->first();
        if($status->status == 'auto') {
            SwitchRate::where('id', 1)->update(['status' => 'manual']);
        }else {
            SwitchRate::where('id', 1)->update(['status' => 'auto']);
        }
    }

    public function getStatus() {
        $status = SwitchRate::latest()->first();
        return $status;
    }

    public function render()
    {
        $status = $this->getStatus();
        return view('livewire.rate-switch', ['status' => $status]);
    }
}
