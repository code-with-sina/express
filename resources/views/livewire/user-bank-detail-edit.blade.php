<div class="col-md-12 dashboard-activity-box my-2">
    <form method='post' wire:submit.prevent='Action()'>
    <div class="row my-4 px-2 px-sm-2 px-md-4">
     <div class="col-md-1 d-flex">
         <i class="bi bi-bank2 h1 d-flex align-items-center text-success"></i>
     </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-12 col-form-label  dashboard-timer">Bank Name</label>
                        <div class="col-sm-12">
                        <select class="form-control dashboard-timer dashboard-activity-box" id="getdatas" wire:model='bank_name'>
                            <option value="{{ $users->bank_id }} {{ $users->nipcode }}"> {{ $users->bank_name }} </option>
                            @foreach($banklist  as $bank)
                                    <option value="{{ $bank->uuid }} {{ $bank->nipcode }}"> {{ $bank->name }} </option>
                            @endforeach
                                
                            </div>
                        </select>
                    </div>
                    <div class="mb-1 row">
                        <label for="inputPassword" class="col-sm-12 col-form-label dashboard-timer">Account</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control dashboard-timer dashboard-activity-box" id="inputPassword" value="{{ auth()->user()->name }}">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label for="inputPassword" class="col-sm-12 col-form-label dashboard-timer">Account Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control dashboard-timer dashboard-activity-box" id="inputPassword" value="adesanya izzilolo" wire:model='account_number'>
                        </div>
                    </div>
                    <button type="submit" class="btn dashboard-inner-active-bar my-2" onclick="loader()">
                        <span id="loading" class="visually-hidden spinner-grow spinner-grow-sm text-light" role="status" aria-hidden="true"></span>
                        <span id="makechange">Save</span>
                    </button>
                </div>
            </div> 
            @if (Session::get('error'))
                <span class="dashboard-timer mt-3">
                    {{ Session::get('error') }} 
                </span>
            @endif
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
