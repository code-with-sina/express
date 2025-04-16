<div class="p-0">
    @if (count($props) === 0)
    <div class="col-md-12 dashboard-activity-box my-2">
        <div class="row my-4 px-3 px-sm-3 px-md-4 py-4">
            <div class="col-md-1 d-flex">
                <i class="bi bi-bank2 h1 d-flex align-items-center text-success"></i>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 py-4">
                        <span>
                            {{ __('No account added at the moment') }}
                        </span>
                    </div>
                </div> 
            </div>
            <div class="col-md-2 d-flex">
                <div class="d-flex align-items-center w-100">
                    <div class="ms-5">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @else
    @foreach ($props as $item)
        <div class="col-md-12 dashboard-activity-box my-2">
            <div class="row my-4 px-3 px-sm-3 px-md-4 py-4">
                <div class="col-2 col-xs-1 col-lg-1 py-4">
                    <i class="bi bi-bank2 h1 text-success"></i>
                </div>
                <div class="col-7 col-xs-9 col-lg-9">
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                                {{ $item->bank_name}}
                            </span>
                            <br>
                            <span>
                                {{ $item->account_number}}
                            </span>
                            <br>
                            <small class="dashboard-timer">
                                {{ $item->account_name}}
                            </small>
                        </div>
                    </div> 
                </div>
                <div class="col-3 col-xs-2 col-lg-2">
                    <div class="py-4">
                        <div class="ms-5">
                            <span class="">
                                <a href="{{ route('users.bank.edit', ['users_id' => auth()->user()->id, 'id' => $item->id])}}" class="text-white">
                                    <i class="bi bi-pencil-fill h4 dashboard-timer"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif


</div>

