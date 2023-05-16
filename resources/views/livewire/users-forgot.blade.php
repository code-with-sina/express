<div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
    <div class="row px-4">
        <div class="col-12">
            <h2 class="heading-ratefy-h1">
                <span class="form-ratefy">
                    Forgot 
                </span>
                <span class="ratefy-gradient">
                    password
                </span>
            </h2>
            <p class="paragraph-ratefy-p2">
                Enter your email address and your password will be reset and emailed to you.
            </p>
        </div>
        <div class="col-12">
            <form method="get" wire:submit.prevent='ForgotHandler()' class="mb-3">
                <div class="input-group mb-5">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="email@example.com" aria-label="Username" aria-describedby="basic-addon1" wire:model='email'>
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="d-grid gap-2 mt-5">
                    <button class="btn btn-primary py-2 rounded-5 button-bg" type="submit"> <i class="bi bi-envelope-at"></i> Reset my password</button>
                </div>
            </form>
            <p class="text-center">
                <span class="ratefy-auth-paragraphs">Forget it,</span> <a href="{{ route('users.login') }}" class="ratefy-auth-links">send me back</a> <span class="ratefy-auth-paragraphs">to the sign in screen.</span>
            </p>
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </div>
</div>