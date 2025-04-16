<div class="col-md-12 dashboard-activity-box my-2 d-block d-md-none d-lg-none">
    <div class="row p-2 p-sm-2 p-md-5">
        <div class="col-md-12">
            <h2>
                Address
            </h2>  
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Address line 1</p>
            </div>
            <div class="col-md-4">
                <p>{{ __($props->first_address ?? '') }}</p>
            </div>
            <div class="col-md-4 order-first">
                <span class="float-end">
                    <a href="{{ route('users.profile.address') }}" class="float-end text-white">
                        <i class="bi bi-pencil-fill h4 dashboard-timer"></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Landmark (optional 1)</p>
            </div>
            <div class="col-md-4">
                <p> {{ __($props->landmark ?? '') }} </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>City / Town</p>
            </div>
            <div class="col-md-4">
                <p> {{ __($props->city ?? '') }} </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>State</p>
            </div>
            <div class="col-md-4">
                <p> {{ __($props->state ?? '') }} </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Postal code</p>
            </div>
            <div class="col-md-4">
                <p> {{ __($props->postal_code ?? '') }} </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 dashboard-timer">
                <p>Country</p>
            </div>
            <div class="col-md-4">
                <p> {{ __($props->country ?? '') }} </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>

<div class="p-2 p-sm-2 dashboard-activity-box p-md-5 d-none d-md-block d-lg-block">
    <div class="row">
        <div class="col-md-12">
        <h2>
            Address
        </h2>  
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>Address line 1</p>
        </div>
        <div class="col-md-4">
            <p>{{ __($props->first_address ?? '') }}</p>
        </div>
        <div class="col-md-4">
            <span class="float-end">
                <a href="{{ route('users.profile.address') }}" class="float-end text-white">
                    <i class="bi bi-pencil-fill h4 dashboard-timer"></i>
                </a>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>Landmark (optional 1)</p>
        </div>
        <div class="col-md-4">
            <p> {{ __($props->landmark ?? '') }} </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>CityTown</p>
        </div>
        <div class="col-md-4">
            <p> {{ __($props->city ?? '' ) }} </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>City / Town</p>
        </div>
        <div class="col-md-4">
            <p> {{ __($props->state ?? '' ) }} </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>Postal code</p>
        </div>
        <div class="col-md-4">
            <p> {{ __($props->postal_code ?? '') }} </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 dashboard-timer">
            <p>Country</p>
        </div>
        <div class="col-md-4">
            <p> {{ __($props->country ?? '') }} </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    </div>
    
</div>

