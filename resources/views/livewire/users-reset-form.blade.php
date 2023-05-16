<div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
    <div class="row px-4">
        <div class="col-12">
            <h2 class="heading-ratefy-h1 text-center">
                <span class="form-ratefy">
                    Reset
                </span>
                <span class="ratefy-gradient">
                    Password
                </span>
            </h2>
           
        </div>
        <div class="col-12">
            <form wire:submit.prevent="ResetHandler()" method="post" autocomplete="off" class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="email@example.com" aria-label="Username" aria-describedby="basic-addon1" wire:model='email'>
                </div>
                @error('email')
                    <span class="text-danger">{{ $mesage }}</span>
                @enderror
                <div class="input-group mb-1">
                    <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                    <input type="text" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" aria-label="Amount (to the nearest dollar)" placeholder="New Password" wire:model='new_password'>
                    <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye"></i></span>
                </div>
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group mb-1">
                    <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                    <input type="text" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" aria-label="Amount (to the nearest dollar)" placeholder="Confirm Password" wire:model='confirm_new_password'>
                    <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye"></i></span>
                </div>
                @error('confirm_new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                
                <div class="d-grid gap-2 mt-5">
                    <button class="btn btn-primary py-2 rounded-5 button-bg" type="submit">Reset Password<</button>
                </div>
            </form>
            <p class="text-center">
                <span class="ratefy-auth-paragraphs">Back to login?</span> <a href="{{ route('users.login') }}" class="ratefy-auth-links"><i class="bi bi-cursor"></i></a>
            </p>
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {!! Session::get('fail') !!}
                </div>
            @endif

            @if(Session::get('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
        </div>
    </div>
</div>



