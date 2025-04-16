<div class="col-md-12 dashboard-activity-box my-2">
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
    <form method="post" wire:submit.prevent='verify()'>
        <div class="row my-4 px-2 px-sm-2 px-md-4">
        <div class="col-2 col-xs-2 col-md-2 col-lg-2 py-5">
            <i class="bi bi-bank2 h1 text-success"></i>
        </div>
        <div class="col-10 col-xs-10 col-md-10 col-lg-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-12 col-form-label  dashboard-timer">Bank Name</label>
                        <div class="col-sm-12">
                            <select class="form-control dashboard-timer dashboard-activity-box" id="getdatas" wire:model='bank_name'>
                                <option> SELECT BANK </option>
                                @foreach($banks  as $bank)
                                    <option value="{{ $bank->uuid }} {{ $bank->nipcode }}"> {{ $bank->name }} </option>
                                @endforeach
                                
                            </select>
                            @error('bank_name')
                                <span class="text-danger">
                                {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!--<input type="text" id="giveData" wire:model='bank_code'>-->
                    <!--<input type="text" id="giveMata" wire:model='bank_name'>-->
                    <div class="mb-1 row">
                        <label for="inputPassword" class="col-sm-12 col-form-label dashboard-timer">Account Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control dashboard-timer dashboard-activity-box" id="inputPassword" value="adesanya izzilolo" wire:model='account_number'>
                            @error('account_number')
                                <span class="text-danger">
                                {{ $message }}
                                </span>
                            @enderror
                        </div>
                        @if (Session::get('error'))
                            <span class="dashboard-timer mt-3">
                                {{ Session::get('error') }} 
                            </span>
                        @endif
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-12 col-sm-12 col-md-2 my-2">
            <div class="row justify-content-end">
                <div class="col-10 col-md-10 col-lg-10">
                    <div class="d-grid">
                        <button type="submit" class="btn buttonSecondary" onclick="loader()">
                            <span id="loading" class="visually-hidden spinner-grow spinner-grow-sm text-light" role="status" aria-hidden="true"></span>
                            <span id="makechange">Verify</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </form>
 </div>
 
 
 <script>
    function loader() {
        var loader = document.getElementById("loading");
        var changeText = document.getElementById("makechange");
        loader.classList.remove("visually-hidden");
        changeText.textContent = "Loading...";
    }
        
 </script>
