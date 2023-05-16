<div class="col-md-12 dashboard-activity-box my-2 d-block d-md-none d-lg-none">
    <div class="row p-2 p-sm-2 p-md-5">
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
                <p>{{ $username }}</p>
            </div>
            <div class="col-md-4 order-first">
                <a href="{{ route('users.profile.detail') }}" class="float-end text-white">
                    <i class="bi bi-pencil-fill h4 dashboard-timer"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Fullname</p>
            </div>
            <div class="col-md-4">
                <p>{{ $name }}</p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Email</p>
            </div>
            <div class="col-md-4">
                <p>{{ __($email) }}</p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>


<div class="col-md-12 dashboard-activity-box my-2 d-none d-md-block d-lg-block">
    <div class="row p-2 p-sm-2 p-md-5">
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
                <p>{{ $username }}</p>
            </div>
            <div class="col-md-4">
                <a href="{{ route('users.profile.detail') }}" class="float-end text-white">
                    <i class="bi bi-pencil-fill h4 dashboard-timer"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Fullname</p>
            </div>
            <div class="col-md-4">
                <p>{{ $name }}</p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Email</p>
            </div>
            <div class="col-md-4">
                <p>{{ __($email) }}</p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>