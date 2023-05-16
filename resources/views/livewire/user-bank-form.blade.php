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
                                @foreach ($banks['data'] as $bankProtocol)
                                   <option value="{{ $bankProtocol['code'] }} {{ $bankProtocol['name'] }}">
                                    
                                 {{$bankProtocol['name'] }}</option>
                                
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
                        <button type="submit" class="btn buttonSecondary">Verify</button>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </form>
 </div>
 
 
 <script>
    // function getData() {
    //     var selectBox = document.getElementById("getdatas");
    //     var giveBox = document.getElementById("giveData");
    //     var giveMox = document.getElementById("giveMata");
    //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    //     var taker = selectedValue.split(' ');
    //     giveMox.value = taker.shift();
        
    //     giveBox.value = taker.join(" ");
    //     console.log(taker.join(" "));
       
    // }     
     
 </script>
