<div>
    <div class="row">
        <livewire:get-data />
        @forelse ($new_properties as $item)
        <div class="col-md-12 mb-1">
          <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-green-lt avatar"><!-- Download SVG icon from http://tabler-icons.io/i/arrow-up -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="18" y1="11" x2="12" y2="5"></line><line x1="6" y1="11" x2="12" y2="5"></line></svg>
                    </span>
                  </div>
                  <div class="col">
                    <small class="text-muted mt-1">USDT to NGN </small>
                </div>
                <div class="col">
                  <small class="text-muted mt-1"> NGN {{ $item->rate_normal }} </small>
                </div>
                  <div class="col-auto">
                    <div class="text-muted text-sm">
                      <small>{{   \Carbon\Carbon::parse($item->exchange_time)}} </small>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="font-weight-medium">
                      <span class="float-right font-weight-medium text-green">
                        @php
                          $getOrigin = \App\Models\ExchangeRate::find(1);
                          $original = $getOrigin->rate_decimal;
                          $current =  $item->rate_decimal;
                          $diff = $current - $original;
                          $more_less = $diff > 0 ? "More" : "Less";
                          $diff = abs($diff);
                          $percentChange = ($diff/$original) * 100;
                        @endphp
                        
                        {{ __(round($percentChange, 2)) }}%
                      </span>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>

      @empty
          <div class="text-danger">No Data yet</div>            
      @endforelse
    </div>

    <div class="d-block my-2">
      {{ $new_properties->links('livewire::simple-bootstrap') }}
  </div>
</div>
