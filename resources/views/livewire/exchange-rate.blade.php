<div wire:poll.3600s>
  <div class="card rounded-4 " id="exchange-rate">
    <div class="card-body text-dark" >
        <div class="input-group mb-3">
            <span class="input-group-text text-dark bg-white border-4 border-end-0" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control form-control-lg border-4 bg-white border-start-0" placeholder=" Search E-wallet " aria-label="Username" aria-describedby="basic-addon1" wire:model='search'>
        </div>
        @if($message !== null || $message !== '')
          <p class="text-danger">{{ $message }} </p>
        @endif
        <div class="row p-0 m-0 justify-content-between">
            <div class="col-5 px-0">
                <span class="small-font fw-bold">Payment method</span>
            </div>
            <div class="col-5">
                <span class="small-font fw-bold mx-lg-5">Avg. <em class="text-success fw-bold"><i class="bi bi-stopwatch fs-5"></i></em></span>
            </div>
            <div class="col-2 px-0">
                <span class="small-font  fw-bold mx-lg-3">rate <em class="text-success fw-bold fs-5"><i class="bi bi-graph-up-arrow"></i></em>  </span>
            </div>
        </div>
        
        <ul class="list-group border border-0 scroll" >
          @foreach ($props as $item)
            @php
              $status = \App\Models\RateSwitch::latest()->first();

              if($status->status == 'auto'){
                $rate = \App\Models\ExchangeRate::latest()->first();
                $price =  $item->percntage;
                $newprice = $rate->rate_normal * ((100 - $price) / 100);
              }else {
                $rate = \App\Models\ManualRate::latest()->first();
                $price =  $item->percntage;
                $newprice = $rate->rate_normal * ((100 - $price) / 100);
              }

             
            @endphp
            <li class="list-group-item border border-0 border-bottom">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-1 mx-0 px-0 py-1">
                    <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $item->image_path }}" alt="" class=" mobile-view">
                  </div>
                  <div class="col-5 px-0">
                    <div class="row p-0 m-0">
                      <div class="col-12">
                        <span class="fw-bold exchange-rate-dashboard-header">{{ $item->item }}</span>
                      </div>
                      <div class="col-12">
                        <div class="exchange-rate-dashboard-title"> {{ $item->sub_item}} </div>
                      </div>
                      <div class="col-12">
                        <button type="button" class="exchange-rate-dashboard-subtitle">{{ $item->labels }}</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 mx-0 px-0">
                    <span class="fw-bold exchange-rate-dashboard-time-limit">{{ $item->duration ?? '8' }} {{ $item->duration_cap ?? 'mins' }}</span>
                  </div>
                  <div class="col-4 px-0">
                      <div class="row float-end mx-0 px-0">
                      <div class="col-12 px-0 mx-0">
                            <span class="fw-bold exchange-rate-dashboard-exchange-rate py-1 float-end">₦ {{ number_format($newprice, 2) }} </span>  
                          </div>
                          <div class="col-12 px-0 mx-0">
                              <a href="{{ route('users.login')}}" class="btn btn-success buttonSecondary exchange-rate-dashboard-button float-end">calculate & sell</a>
                          </div>
                        
                        
                      </div>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
        <div class="row text-muted py-1">
          <div class="col-12 col-md-6 py-0">
          <a type="button" class="text-dark nav-link float-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi bi-play-btn"></i> how to 
            </a>
          </div>
          <div class="col-12 col-md-6 py-0">
           
            <small class="float-end fs-6">
  
               
                last updated <span id="minutes" style="color:#00A36C;"></span> : <span id="seconds" style="color:#00A36C;"></span> secs ago

            </small>  
          </div>
      </div>  
    </div>
  </div>
</div>






<script>
    window.onload = (event) => {
 
      var count_id = "{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon($rate->created_at)->addHour()) }}";
      var countDownDate = new Date(count_id).getTime();

          var x = setInterval(function(){
            var  now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance %(1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance %(1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance %(1000 * 60)) / (1000));

            document.getElementById("minutes").innerHTML = 60 - minutes;
            document.getElementById("seconds").innerHTML = 60 - seconds;
            if(distance < 0) {
                clearInterval(x);
                document.getElementById("minutes").innerHTML = '';
                document.getElementById("seconds").innerHTML = '';
               
            }
        }, 1000);
      console.log("page is fully loaded");
};
    
</script>