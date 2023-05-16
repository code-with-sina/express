<div>
    <form method="post" wire:submit.prevent='updateSellerProfile()'>
        <div class="col-md-12 mb-1">
            <div class="container card-sm">
                <div class="card-body">
                  <div class="mb-3">
                        <label class="form-label">Payment Type</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="PayPal" wire:model='payment_type'>
                        @error('payment_type')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                  <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="example-text-input" placeholder="Oladele Akinwande" wire:model='full_name'>
                      @error('full_name')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="09134567676" wire:model='phone_number'>
                    @error('phone_number')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                </div>
              </div>
          </div>
    </form>
</div>
