<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\ExpressTransaction;

class ExpressTransactionTopStatus extends Component
{
    public $props;

    public function mount(Request $request) {
        $this->props = ExpressTransaction::where('order_id', $request->message)->first();
    }

    public function render(Request $request)
    {
        // $sessionId = $request->message;
        return view('livewire.express-transaction-top-status');
    }
}
