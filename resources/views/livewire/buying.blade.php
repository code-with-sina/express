<div>
    <form method="post" wire:submit.prevent='QeueBuy()'>
        <div class="col-md-12 mb-1">
            <div class="container card-sm">
                <div class="card-body">
                  <div class="mb-3">
                        <label class="form-label">Wallet Type</label>
                        
                        <select type="text" class="form-control" name="example-text-input" placeholder="Wallet Type" wire:model='wallet_type'>
                            @foreach ($wallets as $item)
                                <option>{{$item->item}}</option>
                            @endforeach
                           
                        </select>
                        @error('wallet_type')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Availability</label>
                        <select type="text" class="form-control" name="example-text-input" placeholder="availability" wire:model='availability'>
                            <option>On</option>
                            <option>Off</option>
                        </select>
                        @error('availabilty')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="example-text-input" placeholder="Amount" wire:model='amount'>
                           
                        @error('amount')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Currency</label>
                        <select type="text" class="form-control" name="example-text-input" placeholder="Currency" wire:model='currency'>
                            <option>NGN</option>
                            <option>USD</option>
                            <option>GBP</option>
                        </select>
                        @error('currency')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Queue Buying</button>
                  </div>
                </div>
              </div>
          </div>
    </form>
</div>
