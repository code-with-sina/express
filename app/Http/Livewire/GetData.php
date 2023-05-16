<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\ExchangeRate;

class GetData extends Component
{
    public $getData = 0;
    public $rate_normal, $rate_decimal, $exchange_time, $assets_id_from, $assets_id_to;
    protected $listeners = ['render', 'reRenderParent'];

    public function updateRate(){

        $check = ExchangeRate::find(1);
        if($check == null){

            $postData = new ExchangeRate();
            $postData->rate_normal      =   $this->rate_normal;
            $postData->rate_decimal     =   $this->rate_decimal;
            $postData->assets_id_from   =   $this->assets_id_from;
            $postData->assets_id_to     =   $this->assets_id_to;
            $postData->exchange_time    =    \Carbon\Carbon::parse($this->exchange_time);
            $postData->status           =   1;

            $dataSaved      =   $postData->save();

            if( $dataSaved ){
                //
                $this->showToastr('Rate has been successfully updated', 'success');
                
                $this->getData = 1;
                $this->emit('refreshComponent');
            }


        }else{
            
            $postData = new ExchangeRate();
            $postData->rate_normal      =   $this->rate_normal;
            $postData->rate_decimal     =   $this->rate_decimal;
            $postData->assets_id_from   =   $this->assets_id_from;
            $postData->assets_id_to     =   $this->assets_id_to;
            $postData->exchange_time    =    \Carbon\Carbon::parse($this->exchange_time);
            $postData->status           =   2;

            $dataSaved      =   $postData->save();

            if( $dataSaved ){
                //
                $this->showToastr('Rate has been successfully updated', 'success');
                $this->getData = 1;
                $this->emit('refreshComponent');
                // $this->emit('render');
            }
        }
    }

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }
    
    public function getData(){
        $this->getData = 1;
        $this->emit('render');
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }


    public function render()
    {
        $properties = 'no data';
        if($this->getData == 1){
            $properties = Http::withHeaders(['X-CoinAPI-Key' => '9B554A1B-EBF1-4B3A-B7C0-B2346614E136'])->get('https://rest.coinapi.io/v1/exchangerate/USDT/NGN')->json();
            $this->rate_normal = (int)$properties['rate'];
            $this->rate_decimal = $properties['rate'];
            $this->exchange_time = $properties['time'];
            $this->assets_id_from = $properties['asset_id_base'];
            $this->assets_id_to = $properties['asset_id_quote'];
            
        }
        
        return view('livewire.get-data', ['props' => $properties]);
    }
}
