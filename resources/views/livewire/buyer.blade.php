<div>
    <div>
        <form method="post" wire:submit.prevent='QeueBuy()'>
            <div class="col-md-12 mb-1">
                <div class="container card-sm">
                    <div class="card-body">
                      <div class="mb-3">
                            <label class="form-label">Wallet Type</label>
                            
                            <select class="form-control"  placeholder="Wallet Type" wire:model='wallet_type'>
                                @foreach ($wallets as $item)
                                    <option value="{{$item->item}}">{{$item->item}}</option>
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
                            <select class="form-control"  placeholder="availability" wire:model='availability'>
                                <option value=''>Select</option>
                                <option value='on'>On</option>
                                <option value='off'>Off</option>
                            </select>
                            @error('availability')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control"  placeholder="Amount" wire:model='amount'>
                               
                            @error('amount')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select type="text" class="form-control"  placeholder="Currency" wire:model='currency'>
                                <option value="NGN">NGN</option>
                                <option value="USD">USD</option>
                                <option value="GBP">GBP</option>
                            </select>
                            @error('currency')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Note to seller</label>
                            <textarea type="text" class="form-control"  rows="5"  placeholder="Note To Seller" wire:model='notetoseller'>
                            </textarea>
                            @error('notetoseller')
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
    
</div>
