<div>
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {!! Session::get('fail') !!}
        </div>
    @endif

    @if (Session::get('success'))
        <div class="alert alert-danger">
            {!! Session::get('success') !!}
        </div>
    @endif
    <form method="post" wire:submit.prevent='ChangePassword()'>
        <div class="row">
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Current Password</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Current Password" wire:model='current_password'>
              @error('current_password')
                <span class="text-danger">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="New Password" wire:model='new_password'>
              @error('new_password')
                <span class="text-danger">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Confirm new password</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Confirm new password" wire:model='confirm_new_password'>
              @error('confirm_new_password')
                <span class="text-danger">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
        </div>
        <button class="btn btn-primary">Change Password</button>
      </form>
</div>
