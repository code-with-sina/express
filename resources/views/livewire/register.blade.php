<div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
    <div class="row px-4">
        <div class="col-12">
            <h2 class="heading-ratefy-h1">
                <span class="form-ratefy">
                    Create
                </span>
                <span class="ratefy-gradient">
                    account
                </span>
            </h2>
            <p class="paragraph-ratefy-p2">
                Sign up to get started!
            </p>
        </div>
        <div class="col-12">
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <form wire:submit.prevent="Register()" method="post" autocomplete="off" class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="Firstname Lastname" aria-label="Username" aria-describedby="basic-addon1" wire:model='name'>
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                    <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="username" aria-label="Email address" aria-describedby="basic-addon1" wire:model='username'>
                </div>
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-envelope-open"></i></span>
                    <input type="email" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="email" aria-label="Email address" aria-describedby="basic-addon1" wire:model='email'>
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1" wire:model='mobile_number'>
                </div>
                @error('mobile_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
 
                <div class="input-group mb-3">
                    <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" id="passImput" aria-label="Amount (to the nearest dollar)" placeholder="Password" wire:model='password'>
                    <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye" onClick="togglePassword()"></i></span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group mb-4">
                    <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" aria-label="Amount (to the nearest dollar)" placeholder="Cofirm Password" wire:model='password_confirmation'>
                    <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye"></i></span>
                </div>                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary py-2 rounded-5 button-bg" type="submit">Sign up</button>
                </div>
            </form>
            <p class="text-center">
                <span class="ratefy-auth-paragraphs">Already have an account?</span> <a href="{{ route('users.login') }}" class="ratefy-auth-links">Log in</a>
            </p>
        </div>
    </div>
</div>


