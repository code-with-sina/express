<div>
    <form method="post" wire:submit.prevent='postAnouncement()'>
        <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <div class="mb-3">
                      <label class="form-label">Subject</label>
                      <input type="text" class="form-control" name="example-text-input" placeholder="subject" wire:model='subject'>
                      @error('subject')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Amount</label>
                      <input type="text" class="form-control" name="example-text-input" placeholder="500" wire:model='amount'>
                      @error('amount')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Description</label>
                      <textarea type="text" class="form-control" cols="5" rows="5" wire:model='description'>Enter description...
                      </textarea>
                      @error('description')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Post Annoucement</button>
                  </div>
                </div>
              </div>
          </div>
    </form>
</div>
