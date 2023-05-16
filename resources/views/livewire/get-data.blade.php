<div>
    <div class="col-md-12 mb-1">
        <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <p>Exchange Rate</p>
                </div>
                <div class="col-md-4">
                  <button class="text-white btn btn-primary text-sm"  wire:click.prevent='getData()'>
                    GET DATA
                  </button>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-12">
        @if ($getData == 1)
            <div class="card card-sm">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                    <span class="bg-green-lt avatar"><!-- Download SVG icon from http://tabler-icons.io/i/arrow-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="18" y1="11" x2="12" y2="5"></line><line x1="6" y1="11" x2="12" y2="5"></line></svg>
                    </span>
                    </div>
                    <div class="col">
                        
                            {!! $props['rate'] !!}
                        
                        
                    <small class="text-muted mt-1">USDT to NGN </small>
                </div>
                    <div class="col-auto">
                    <div class="font-weight-medium mt-1">

                    </div>
                    <div class="text-muted text-sm">
                        
                            {{   \Carbon\Carbon::parse($props['time'])}} 
                        
                    </div>
                    </div>
                    <div class="col">
                        <input type="hidden"   wire:model='rate_normal'>
                        <input type="hidden"   wire:model='rate_decimal'>
                        <input type="hidden"   wire:model='exchange_time'>
                        <input type="hidden"   wire:model='assets_id_from'>
                        <input type="hidden"   wire:model='assets_id_to'>
                        <button class="text-white btn btn-primary float-right"  wire:click.prevent='updateRate()'>
                        UPDATE
                        </button>
                    </div>
                </div>
                </div>
            </div>
          @endif
    </div>
</div>
