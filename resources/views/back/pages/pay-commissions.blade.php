@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Commissions
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    
    <div class="col-md-6">
      @if (auth()->user()->type == 1)
        <div class="row">
          <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <h3>Payment Process</h3>
                </div>
                <div class="card-body">
                    <h3> Name: <small>{{ $bank->account_name }} </small></h3>
                </div>
            </div>

            <div class="card card-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    Amount: 
                                </div>
                                <div class="col-9">
                                    {{ $amount }}   
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                Account Number: 
                                </div>
                                <div class="col-9"> 
                                    {{ $bank->account_number }}   
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    Bank:
                                </div>
                                <div class="col-9">
                                    {{ $bank->bank_name }}   
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    Status:
                                </div>
                                <div class="col-9">
                                    {{ $bank->status }}   
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    Action:   
                                </div>
                                <div class="col-9">
                                    <input type="hidden" name="" id="amount" value="{{ $amount }}">
                                    <input type="hidden" name="" id="bank_name" value="{{ $bank->bank_name }}">
                                    <input type="hidden" name="" id="session" value="{{ $approval }}">
                                    <input type="hidden" name="" id="account_number" value="{{ $bank->account_number }}">
                                    <input type="text" name="" id="userid" value="{{ $bank->users_id }}">
                                    <input type="text" name="" id="name" value="{{ $bank->account_name }}">
                                    <input type="text" name="" id="bank_uuid" value="{{ $bank_uuid }}">
                                    <button type="submit" id="commissionPay" class="btn btn-primary">Disburse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
        </div>
      
      @endif
     
    </div>
    
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let commissionPay           = document.getElementById('commissionPay');
    let commissionAmount        = document.getElementById('amount');
    let commissionSession       = document.getElementById('session');
    let commissionAccount       = document.getElementById('account_number');
    let commissionBank          = document.getElementById('bank_name');
    let commissionBankUUID      = document.getElementById('bank_uuid');
    let commissionUserID        = document.getElementById('userid');
    let commissionName          = document.getElementById('name');

    let nim = window.navigator.appVersion;
    const successCallback = (position) => {
        console.log(position);
    };
    
    const errorCallback = (error) => {
        console.log(error);
    };
    let max = navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

    let userData = {location: max, version: nim};
    let objData = JSON.stringify(userData);

    commissionPay.addEventListener('click', (event) => {
        event.preventDefault();
        axios.post('/author/express/disburse/commission-payment', {
            session: commissionSession.value,
            account: commissionAccount.value,
            finger:  objData,
        }).then(function (response) {
            if(response.status == 200){

                let passcode = prompt("Enter OPT");
                axios.post('/author/commission-confirm-otp', {
                    passcode: passcode,
                    session: {{ $approval }},
                    amount: commissionAmount.value,
                    bank_name: commissionBank.value,
                    account_number: commissionAccount.value,
                    account_name: commissionName.value,
                    bank_uuid: commissionBankUUID.value,
                    users_id: commissionUserID.value
                }).then(function(response) {
                    console.log(response);
                    if(response.status == 201){
                        alert('Paid');
                        window.location.href = '/author/commission';
                    }
                });
            }else if(response.status == 400){
                alert(response.data.message);
            }else if(response.status == 208){
                
                alert(response.data.message);
            }
            
        }); 
    });
    

</script>
@endpush