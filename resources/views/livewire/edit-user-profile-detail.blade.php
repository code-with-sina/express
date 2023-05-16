<div class="col-md-12 dashboard-activity-box my-2 d-block d-md-none d-lg-none">
    <div class="row p-2 p-sm-2 p-md-5">
        <form wire:submit.prevent='UpdateDetails()' method="post">
            <div class="col-md-12">
                <h2>
                    Name and email
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Username</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="username" wire:model='username'>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 order-first">
                    <a href="{{ route('users.profile') }}" class="float-end text-white">
                        {{-- <i class="bi bi-pencil-fill h4 dashboard-timer"></i> --}}
                        <i class="bi bi-arrow-return-left h4 dashboard-timer"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Fullname</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="name" wire:model='name'>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Email</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="email" disabled wire:model='email'>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    
                </div>
                <div class="col-md-4 d-grid gap-2">
                    <button type="submit" class="btn  buttonSecondary">Save changes</button>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </form>
    </div>
</div>


<div class="col-md-12 dashboard-activity-box my-2 d-none d-md-block d-lg-block">
    <div class="row p-2 p-sm-2 p-md-5">
        <form wire:submit.prevent='UpdateDetails()' method="post">
            <div class="col-md-12">
                <h2>
                    Name and email ser
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Username</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="username" wire:model='username'>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <a href="{{ route('users.profile') }}" class="float-end text-white">
                        {{-- <i class="bi bi-pencil-fill h4 dashboard-timer"></i> --}}
                        <i class="bi bi-arrow-return-left h4 dashboard-timer"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Fullname</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="name" wire:model='name'>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    <p>Email</p>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-2 dashboard-timer dashboard-activity-box" name="example-text-input" placeholder="email" disabled wire:model='email'>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 dashboard-timer">
                    
                </div>
                <div class="col-md-4 d-grid gap-2">
                    <button type="submit" class="btn  buttonSecondary">Save changes</button>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </form>
    </div>
</div>