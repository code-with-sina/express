<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FeedbackRate;
use Illuminate\Http\Request;
use App\Models\ExpressTransaction;

class ExpressChatCongratActivity extends Component
{
    public $props;

    public $userId;

    public $question_a, $question_b, $rate;

   

    public function mount(Request $request) {
        $this->props    = ExpressTransaction::where('order_id', $request->message)->first();
        $this->userId   = FeedbackRate::where('session_id', $this->props->order_id)->first();
        $question_a     = $this->userId->question_a ?? '';
        $question_b     = $this->userId->question_b ?? '';
        $rate           = $this->userId->rate ?? ''; 
    } 


    public function create() {
        $gatekeep =  FeedbackRate::where('users_id', auth()->user()->id)->where('session_id', $this->props->order_id)->first();
        if(!$gatekeep){
            $create = new FeedbackRate();
            $create->users_id       = auth()->user()->id;
            $create->question_a     = $this->question_a;
            $create->question_b     = $this->question_b;
            $create->rates          = $this->rate;
            $create->session_id     = $this->props->order_id;
            
            $check = $create->save();
            return back()->with('success', 'Thank you for the feedback');
        }
    }
    
    public function render()
    {
        return view('livewire.express-chat-congrat-activity');
    }
}
