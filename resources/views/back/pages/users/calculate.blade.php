@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Ratefy | Calculate')
@section('content')

    <div class="container px-0 px-sm-0 px-md-5 py-5 mx-auto" id="calculator">
        <h4 class="dashboard-heading-h2">
            Get Receiving Amount  And <span class="ratefy-gradient">Exchange Fund</span>
        </h4>
        <p class="dashboard-paragraph-p1">
            Use this straightforward Calculator to know your potential receiving amount and continue with the exchange
        </p>
        <a href="/users/home" class="nav-link"><i class="bi bi-arrow-left fs-4"></i> <span class="fs-6 text-ratefy">home</span></a>
        <div class="container mb-5 px-0">
            <div class="bg-white dashboard-calculator-header py-2 px-3 px-lg-5 text-dark">
                <div class="row px-0 px-lg-3">
                    <!--<div class="col-12 col-md-12 px-0">-->
                        
                        <div class="row mx-0 px-0">
                            @php
                                
                                $props = \App\Models\ExchangeItem::where('id', request()->input('id'))->first();

                            @endphp
                            <div class="col-1  py-1 m-0 p-0">
                                <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $props->image_path }}" class="w-100 mx-0">
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12 my-0">
                                        <span class="dashboard-calculator-rate"> {{ $props->item}} </span>
                                    </div>
                                    <div class="col-12 my-0 py-0">
                                        <span class="dashboard-calculator-subtitle">{{ $props->sub_item}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 py-2 px-0">
                                <span class="dashboard-currency-protocall float-start my-2">{{ $props->labels }}</span>
                            </div>
                            <div class="col-5 py-1">
                                @php
                                    $status = \App\Models\RateSwitch::latest()->first();
                                    $normal = \App\Models\ExchangeRate::latest()->first();
                                    $manual = \App\Models\ManualRate::latest()->first();
                                @endphp
                                <span class="float-end dashboard-calculator-rate"> 
                                    @php
                                        if($status->status == 'auto'){
                                            $input = (int)$normal->rate_normal * ((100 - $props->percntage)  / 100 );
                                            $process = $input;
                                            $output = $process;
                                        }else {
                                            $input = (int)$manual->rate_normal * ((100 - $props->percntage)  / 100 );
                                            $process = $input;
                                            $output = $process;
                                        }                                        
                                    @endphp
                                   ₦ {{ number_format($output, 2) }}
                                </span>
                            </div>
                        </div>
                    <!--</div>-->
                </div>
            </div>
            <div class="dashboard-calculator-footer py-2 px-2 px-lg-5 text-dark">
                <form id="form" method="post">
                    @csrf
                    
                    <div class="row px-3 px-lg-3">
                        <div class="col-12 col-sm-12 col-md-12 px-0">
                            <span for="" class="dashboard-calculator-label">Amount to Send </span>
                            <span for="" id="amount_error" class="text-danger text-sm text-small"></span>
                            <div class="input-group input-group-sm my-3">
                                <!-- <span class="input-group-text border border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3"><i class="bi bi-currency-dollar"></i></span> -->
                                <input type="number" step="any" class="form-control form-control-lg py-2 border border-0 bg-white" id="amount" name="amount"  placeholder="eg. 100">
                                <span class="input-group-text border border-0 rounded-end dashboard-calculator-form px-3 dashboard-calculator-form-right-icon">USD</span>
                            </div>
                            <!-- <div class="row">
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-1 d-flex align-items-center px-3">
                                            <span>%</span>
                                        </div>
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span>$2.00</span>
                                                </div>
                                                <div class="col-12">
                                                    <span>Payoneer withdrawal fee (2%)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div> -->
                            <span for="" class="dashboard-calculator-label">Amount to Recieve</span>
                            <div class="input-group input-group-sm my-3">
                                <!-- <span class="input-group-text border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3">₦</span> -->
                                <input type="number" step="any" class="form-control form-control-lg py-2 border border-0 bg-white" id="total" name="total" placeholder="eg. 143,000...">
                                <span class="input-group-text border-0 rounded-end dashboard-calculator-form dashboard-calculator-form-right-icon px-3">NGN</span>
                            </div>
                        
                        </div>
                        <input type="hidden" name="rate" id="" value="{{ $props->percntage }}">
                        <input type="hidden" name="wallet_name" id="" value="{{ $props->item }}">
                        {{-- <input type="hidden" name="seller-note" id="" value="{{ $props->seller_note ?? 'T|h][ud]' }}"> --}}
                        @php
                            $banks  = \App\Models\CounterPartyAccount::where('users_id', auth()->user()->id)->get();
                            $profile = \App\Models\UserProfileAddress::where('users_id', auth()->user()->id)->first();
                            $span = 0;
                                
                                if(!$banks->isEmpty() && $profile){
                                    $span = 1;
                                }
                        @endphp
                        <div class="input-group input-group-sm my-3">
                            <span class="input-group-text border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3"><i class="bi bi-bank2 h2 text-ratefy"></i></span>
                            <select class="form-select form-select-lg mb-3 border border-0 bg-white py-2" id="bank" name="bank" aria-label=".form-select-lg example" onchange="getRedirect()">
                                <option class="text-secondary">Select bank account</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">
                                        <span class="text-white"> {{ $bank->bank_name }} </span> | 
                                        <strong class="text-muted"> {{ $bank->account_name }} </strong> | 
                                        <small> {{ $bank->account_number}}</small>
                                    </option>
                                @endforeach
                                <option class="text-secondary"  value="https://ratefy.co/users/bank"><a href="https://ratefy.co/users/bank">Add a bank account</a></option>
                            </select>
                        </div>
                        <span class="dashboard-calculator-form-emphasis mb-2">You will get the same amount. No Hidden fee</span>
                        @if($span !== 1)
                            <div class="alert alert-danger py-2" role="alert">
                                <small>
                                    <strong>Requirement:</strong>
                                    <br>
                                        @if($banks->isEmpty())
                                            PLEASE FILL <a href="{{ route('users.bank') }}">YOUR BANK DETAILS</a> 
                                        @endif
                                    <br>
                                        @if(!$profile)
                                            PLEASE FILL IN <a href="{{ route('users.profile') }}"> ADDRESS </a>
                                        @endif
                                    <i class="bi bi-backspace"></i> 
                                </small>
                            </div>
                        @endif
                        <div class="col-md-12 d-grid gap-2">
                            @php
                            
                                $able = 0;
                                
                                if(!$banks->isEmpty() && $profile){
                                    $able = 1;
                                }
                            
                            @endphp
                           
                            <button class="btn buttonSecondary py-2 dashboard-calculator-button-text {{ $able !== 2 ? 'disabled'  : ''}}" id="move"><span class="">SELL NOW  <i class="bi bi-chevron-down"></i></span></button>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container h-100 my-5 py-5" id="sell">
            <div class="dashboard-calculator-seller-note-heading mb-2">Instruction</div>
            <div class="contianer-fluid h-25 py-3 px-3 border border-secondary rounded-3 mb-3">
                <p class="dashboard-calculator-seller-note-paragraph">
                    {!! $props->seller_note !!}
                    
                </p>
            </div>
            <div class="row px-0 mx-0">
                <div class="col-12">
                    <div class="d-grid gap-2 mb-5">
                            <!-- <div class="alert alert-warning" role="alert">
                            <i class="bi bi-bell"></i> We are currently maintaining our transaction page. All trade will be completed via whatsapp for the next 24 hours.
                            </div> -->
                         <button type="submit"  class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled> Agree and Continue </button>
                     </div>
                </div>
            </div>
            

        </div>
        <div class="h-100 vw-100 bg-dark position-absolute top-0 end-0 z-3 invisible" id="proc">
            <div class="position-absolute top-50 start-50 z-3">
                <div class="spinner-grow py-5 px-5 " role="status">
                    <span class="visually-hidden">Loading...</span>
                    
                </div>
                <br />
                <center><small class="">Processing...</small></center>
            </div>    
        </div>
        
    </div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const form = document.querySelector('#form');
    
    let amount      = form.elements.namedItem("amount");
    let total       = form.elements.namedItem("total");
    let bank       = form.elements.namedItem("bank");
    let rate       = form.elements.namedItem("rate");
    let wallet_name       = form.elements.namedItem("wallet_name");
    let proc       = document.querySelector('#proc');
    let sellerNote  = document.getElementById('sell');
    let agreed      = document.getElementsByClassName('agreed');
    let amountError = document.getElementById('amount_error');
    let move        = document.getElementById('move');

    let equatorStart = {{ $props->price_from * $output  }};
    let equatorEnd = {{ $props->price_to  * $output }};


    form.addEventListener('submit', function (e) {
        e.preventDefault();
        sellerNote.scrollIntoView();
        for(var i = 0; i < agreed.length; i++){
            agreed[i].removeAttribute('disabled');
        }

    });

    amount.addEventListener('input', validate);
    total.addEventListener('input', validate);
    function validate(e){
       let target = e.target.value;
       let caution = 50 * {{ $output }};
       if(e.target.name === 'amount'){
            if(target < {{ $props->price_from }}){
                amountError.innerText = 'Amount must not be less than';
            }else if(target > {{ $props->price_to }}) {
                amountError.innerText = 'Amount must not be greater than';
            }else {
                amountError.innerText = '';
                let equator = target * {{ $output }};
                // let equator = total.value;
                total.value = equator.toFixed(0);
            }
            
       }else if(e.target.name === 'total'){
            if(target < (equatorStart - 1)){
                amountError.innerText = 'Amount must not be less than';
            }else if( target > (equatorEnd - 1)) {
                amountError.innerText = 'Amount must not be greater than';
            }else {
                amountError.innerText = '';
                let equator = target / {{ $output }};
                amount.value = equator.toFixed(2);
            }
           
       }
    }

for(var i = 0; i < agreed.length; i++){
    
    agreed[i].addEventListener('click', function(){
        if(amount.value < {{ $props->price_from }} ){
            alert('Amount must not be less than ' + {{ $props->price_from }});
            // amountError.innerText = 'Amount must not be less than';
        }else if (amount.value > {{ $props->price_to }} ){
            alert('Amount must not be greater than ' + {{ $props->price_to }});
            // amountError.innerText = 'Amount must not be greater than';
        }else {
            if(total.value < (equatorStart - 1)){
                alert('Amount must not be less than ' + equatorStart);
                // amountError.innerText = 'Amount must not be less than';
            }else if(total.value > (equatorEnd - 1)){
                alert('Amount must not be greater than ' + equatorEnd);
                // amountError.innerText = 'Amount must not be greater than';
            }else {
                proc.classList.remove('invisible');
                    
                    axios.post('/users/express/transaction', {
                        amount: amount.value, 
                        total: total.value, 
                        id: {{ auth()->user()->id}},
                        wallet_id: {{ $props->id }},
                        bank: bank.value,
                        rate: rate.value,
                        wallet_name: wallet_name.value,
                    })
                    .then(function (response) {
                        console.log(response);
                        proc.classList.add('invisible');
                        console.log(response.data.message);
                            window.location.replace('/users/device?message='+response.data.message);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });    
            }
        }
    });
    
}

bank.addEventListener('click', function() {
    let permit = parseInt({{ $able }}) + 1;
    if(permit == 2){
        move.classList.remove('disabled');
    }
    
});

function getRedirect() {
    selectElement = document.querySelector('#bank');
        output = selectElement.value;
        if(output == 'https://ratefy.co/users/bank'){
            window.location.href=output;
        }
 
}
</script>

@endsection
@push('scripts')

@endpush
