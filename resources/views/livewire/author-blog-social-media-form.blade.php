<div>
    <form  method="post" wire:submit.prevent='updateBlogSocialMedia()'>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-2">
              <label class="form-label">Facebook</label>
              <input type="text" class="form-control"  placeholder="https://facebook.com/ratefy" wire:model='facebook_url'>
              @error('facebook_url')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-2">
              <label class="form-label">Instagram</label>
              <input type="text" class="form-control"  placeholder="https://instagram.com/ratefy" wire:model='instagram_url'>
              @error('instagram_url')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-2">
              <label class="form-label">Youtube</label>
              <input type="text" class="form-control"  placeholder="https://youtube.com/ratefy" wire:model='youtube_url'>
              @error('youtube_url')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-2">
              <label class="form-label">LinkedIn</label>
              <input type="text" class="form-control"  placeholder="https://linkedin.com/ratefy" wire:model='linkedin_url'>
              @error('linkedin_url')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update </button>
      </form>
</div>
