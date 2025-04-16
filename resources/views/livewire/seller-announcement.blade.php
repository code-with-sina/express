<div>
    <form method="post" wire:submit.prevent='postAnouncement()'>
        <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="mb-3">
                        <p>Rate in decimal: {{ $lastrate->rate_decimal }}</p>
                        <p>Rate in USD: {{ $lastrate->rate_normal }}</p>
                      <label class="form-label">Rate</label>
                      <input type="hidden" class="form-control" name="example-text-input" placeholder="id" wire:model='rateid'>
                      <input type="text" class="form-control" name="example-text-input" placeholder="rate in decimal" wire:model='rate_decimal'>
                      @error('subject')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Edit Rate</button>
                  </div>
                </div>
              </div>
          </div>
    </form>
</div>
