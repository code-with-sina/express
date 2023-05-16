<div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
    <div class="row px-4">
        <div class="col-12">
            <h2 class="heading-ratefy-h1">
                <span class="form-ratefy">
                    Sign in
                </span>
                <span class="ratefy-gradient">
                    account
                </span>
            </h2>
            <p class="paragraph-ratefy-p2">
                Sign in to continue!
            </p>
        </div>
        <div class="col-12">
            <form wire:submit.prevent="UsersLoginHandler()" method="post" autocomplete="off" class="mb-3">
                <div class="input-group mb-5">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="Loki Loyfenson" aria-label="Username" aria-describedby="basic-addon1" wire:model='login_id'>
                </div>
                @error('login_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="input-group mb-1">
                    <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" aria-label="Amount (to the nearest dollar)" id="passImput" placeholder="Password" wire:model='password'>
                    <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye" onClick="togglePassword()"></i></span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <small>
                    <span class="ratefy-auth-paragraphs">Forgot Password?</span> <a href="{{ route('users.forgot-password') }}" class="ratefy-auth-links">Click here</a>
                </small>
                
                <div class="d-grid gap-2 mt-5">
                    <button class="btn btn-primary py-2 rounded-5 button-bg" type="submit">Sign in</button>
                </div>
            </form>
            <p class="text-center">
                <span class="ratefy-auth-paragraphs">Don't have an account?</span> <a href="{{ route('users.register') }}" class="ratefy-auth-links">Sign Up</a>
            </p>
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
        </div>
    </div>
</div>
