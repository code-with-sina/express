<div>
    @foreach ($sellings as $item)
    <div class="container my-2 card p-2">
        
        <div class="row my-2">
            <div class="col-md-5">
                {{ $item->wallets}}
            </div>
            <div class="col-md-3">
                {{ $item->currency}}
                {{ $item->capacity}}
            </div>
            <div class="col-md-4">
                {{ $item->available == 1 ? 'available' : 'off'}}
            </div>
            <div class="col-md-12 my-2">
                {{ $item->note}}
            </div>
        </div> 
        <div class="row">
            <form action="{{ route('users.sell')}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" class="form-control mb-2" name="wallets" value="{{$item->wallets}}">
                            <input type="hidden" class="form-control mb-2" name="buying_id" value="{{ $item->seller_id}}" >
                            <input type="text" class="form-control mb-2" name="amount">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">SELL</button>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
      
        
    </div>
     
    @endforeach
    
    
</div>
