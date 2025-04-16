<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\ExpressTransaction;

class NewChatDesktop extends Component
{
    public $props;

    public function mount(Request $request) {
        $this->props = ExpressTransaction::where('order_id', $request->message)->first();
    }

    public function render(Request $request)
    {
        return view('livewire.new-chat-desktop');
    }
}
