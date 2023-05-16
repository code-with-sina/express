<div>
    <div class="container py-3 px-1">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-between">
                        <div class="text-dark text-sm col-6"> 
                        
                       @php
                           
                            if($percentData != 0){
                                $image = \App\Models\ExchangeItem::where('percntage', $percentData)->first();
                        @endphp
                        <img src="/storage/images/exchange_images/thumbnails/thumb_@php echo $image->image_path;}@endphp" alt="" width="25px" class="img-fuild">
                       
                        </div>
                    <div class="text-dark text-sm col-6"> 
                        <span class="float-end fw-bold"> ₦ {{ $predefined * ((100 - ($percentData > 0 ? $percentData : 4.1) ) / 100) }}</span> 
                    </div>
                    </div>
                </div>
                <div class="card-body py-0 text-dark">
                    <div class="row py-0 float-none">
                        <div class="col-6 bg-white">
                           <span class="float-end fw-bold fs-6">SELL</span> 
                        </div>
                        <div class="col-6 bg-light">
                            <span class="float-start fw-light fs-6">BUY</span> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 px-3 pt-0">
                            <div class="row">
                               <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">
                                      <small>Amount To Send</small>
                                    </label>
                                      <div class="input-group mb-3 bg-white rounded-0 border border-white" id="abId0.398105405419346">
                                      <span class="input-group-text bg-white rounded-0 border border-white">$</span>
                                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" wire:model='rate'>
                                      <span class="input-group-text bg-white rounded-0 border border-white">.00</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">
                                      <small>Amount To receive</small>
                                    </label>
                                      <div class="input-group mb-3" id="abId0.398105405419346">
                                      <span class="input-group-text rounded-0 border border-white">₦</span>
                                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" wire:model='amount'>
                                      <span class="input-group-text rounded-0 border border-white">.00</span>
                                    </div>
                                    <small>You will receive the same amount. No hidden fee</small>
                                </div> 
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="card-footer bg-success p-0 text-white text-center py-1 fs-6 fw-bolder sell" wire:click='moveToSell()'>
                        SELL
                </div>
            </div>
    </div>
</div>
