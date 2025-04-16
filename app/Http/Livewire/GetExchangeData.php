<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExchangeItem;

class GetExchangeData extends Component
{
    
    protected $listeners = [
 
        'updateItemsOrdering'
    ];

    public function deleteItem($id){
        $deleted = ExchangeItem::find($id)->delete();

        if($deleted){
            $this->reset();
        }
    }
    
    public function pauseItem($id){
        $pause = ExchangeItem::where('id', $id)->update(['active' => 0]);
        if($pause){
            $this->reset();
        }
    }
    
    
    public function unPauseItem($id){
       $unPause = ExchangeItem::where('id', $id)->update(['active' => 1]);
        if($unPause){
            $this->reset();
        } 
    }
    
    public function updateItemsOrdering($positions){
        foreach($positions as $position){
            $index          = $position[0];
            $newposition     = $position[1];
            ExchangeItem::where('id', $index)->update([
                'ordering'  => $newposition
            ]);

            $this->showToastr('Re-ordering has been successfully updated', 'success');
        }
    }
    
    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }

    public function render()
    {
        $props = ExchangeItem::orderBy('ordering', 'asc')->paginate(40);
        return view('livewire.get-exchange-data', ['props' => $props]);
    }
}

