<div class="p-0 m-0">
    <div class="col-md-12 dashboard-activity-box my-2">
        <form  wire:submit.prevent='changePassword()' method="post">
            <div class="row p-2 p-sm-2 p-md-5">
                <div class="col-md-12">
                    <h2>
                       Change Password
                    </h2>  
                </div>
                <div class="row">
                    <div class="col-md-4 dashboard-timer">
                        <p>Current Password</p>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="Chnage Password" wire:model='current_password'>
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-md-4">
                        <span class="float-end">
                            <a href="{{ route('users.profile') }}" class="float-end text-white">
                                <i class="bi bi-arrow-return-left h4 dashboard-timer"></i>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 dashboard-timer">
                        <p>New Password</p>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="New Password" wire:model='password'>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 dashboard-timer">
                        <p>Confirm new Password</p>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="Confirm new Password" wire:model='confirm_password'>
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 dashboard-timer">
                        
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn  buttonSecondary">Change Password</button>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    
</div>
