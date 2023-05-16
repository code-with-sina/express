<div>
  <div class="card rounded-4 " id="exchange-rate">
    <div class="card-body text-dark" >
        <div class="input-group mb-3">
            <span class="input-group-text text-dark bg-white border-4 border-end-0" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control form-control-lg border-4 bg-white border-start-0" placeholder="Search E-wallet" aria-label="Username" aria-describedby="basic-addon1" wire:model='search'>
        </div>
        <div class="row p-0 m-0 justify-content-between">
            <div class="col-5 px-0">
                <span class="small-font fw-bold">Payment method</span>
            </div>
            <div class="col-2 px-0">
                <span class="small-font  fw-bold">Avg. trade speed</span>
            </div>
            <div class="col-5 px-0">
                <span class="small-font  fw-bold float-end me-3">Exchange rate / $</span>
            </div>
        </div>
        
        <ul class="list-group border border-0 scroll" >
          @foreach ($props as $item)
            @php
              $rate = \App\Models\ExchangeRate::latest()->first();
              $price =  $item->percntage;
              $newprice = $rate->rate_normal * ((100 - $price) / 100);
            @endphp
            <li class="list-group-item border border-0 border-bottom"">
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
              <!--<small class="text-dark fw-bold d-none d-sm-block">Exchage Rate</small>-->
          </div>
          <div class="col-12 col-md-6 py-0">
            <small class="float-end">
              Rate is updated every <span class="fw-bold"> 3 hours </span>
            </small>  
          </div>
      </div>  
    </div>
  </div>
</div>