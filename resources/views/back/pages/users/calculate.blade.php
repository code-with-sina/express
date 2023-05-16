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
                                        <span class="dashboard-calculator-subtitle">$499 or less</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2  py-2 px-0">
                                <span class="dashboard-currency-protocall float-start my-2">Transfer</span>
                            </div>
                            <div class="col-5  py-1">
                                @php
                                    $normal = \App\Models\ExchangeRate::latest()->first();
                                @endphp
                                <span class="float-end dashboard-calculator-rate"> 
                                    @php
                                        $input = (int)$normal->rate_normal * ((100 - $props->percntage)  / 100 );
                                        $process = $input;
                                        $output = $process;
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
                            <span for="" class="dashboard-calculator-label">Amount to Send</span>
                            <div class="input-group input-group-sm my-3">
                                <span class="input-group-text border border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3"><i class="bi bi-currency-dollar"></i></span>
                                <input type="number" step="any" class="form-control form-control-lg py-2 border border-0 bg-white" id="amount" name="amount"  placeholder="eg. 100">
                                <span class="input-group-text border border-0 rounded-end dashboard-calculator-form px-3 dashboard-calculator-form-right-icon">.00</span>
                            </div>
                            <span for="" class="dashboard-calculator-label">Amount to Recieve</span>
                            <div class="input-group input-group-sm my-3">
                                <span class="input-group-text border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3">₦</span>
                                <input type="number" step="any" class="form-control form-control-lg py-2 border border-0 bg-white" id="total" name="total" placeholder="eg. 143,000...">
                                <span class="input-group-text border-0 rounded-end dashboard-calculator-form dashboard-calculator-form-right-icon px-3">.00</span>
                            </div>
                        
                        </div>
                        <input type="hidden" name="rate" id="" value="{{ $props->percntage }}">
                        <input type="hidden" name="wallet_name" id="" value="{{ $props->item }}">
                        {{-- <input type="hidden" name="seller-note" id="" value="{{ $props->seller_note ?? 'T|h][ud]' }}"> --}}
                        @php
                            $banks  = \App\Models\BankUser::where('users_id', auth()->user()->id)->get();
                            $profile = \App\Models\UserProfileAddress::where('users_id', auth()->user()->id)->first();
                            $span = 0;
                                
                                if(!$banks->isEmpty() && $profile){
                                    $span = 1;
                                }
                        @endphp
                        <div class="input-group input-group-sm my-3">
                            <span class="input-group-text border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3"><i class="bi bi-bank2 h2 text-ratefy"></i></span>
                            <select class="form-select form-select-lg mb-3 border border-0 bg-white py-2" id="bank" name="bank" aria-label=".form-select-lg example">
                                <option class="text-secondary">Select bank account</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">
                                        <span class="text-white"> {{ $bank->bank_name }} </span> | 
                                        <strong class="text-muted"> {{ $bank->account_name }} </strong> | 
                                        <small> {{ $bank->account_number}}</small>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="dashboard-calculator-form-emphasis mb-2">You will get the same amount. No Hidden fee</span>
                        @if($span !== 1)
                            <div class="alert alert-danger py-2" role="alert">
                                <small>
                                    <strong>Requirement:</strong>
                                    <br>
                                        @if($banks->isEmpty())
                                            PLEASE FILL YOUR BANK DETAILS 
                                        @endif
                                    <br>
                                        @if(!$profile)
                                            PLEASE FILL IN YOUR PROFILE 
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
                            <button class="btn buttonSecondary dashboard-calculator-button-text {{ $able !== 1 ? 'disabled'  : ''}}"><span class="">SELL NOW  <i class="bi bi-chevron-down"></i></span></button>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container h-100 my-5 py-5" id="sell">
            <div class="dashboard-calculator-seller-note-heading mb-2">Seller's Note</div>
            <div class="contianer-fluid h-25 py-3 px-3 border border-secondary rounded-3 mb-3">
                <p class="dashboard-calculator-seller-note-paragraph">
                    {!! $props->seller_note !!}
                    
                </p>
            </div>
            <div class="row px-0 mx-0">
                
                @if(auth()->user()->id == 28 || auth()->user()->id == 32)
                    <div class="col-6">
                       <div class="d-grid gap-2 mb-5">
                            <button type="submit"  class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled> Continue <i class="bi bi-view-stacked"></i></button>
                        </div>
                   </div>
                   <div class="col-6">
                       <div class="d-grid gap-2 mb-5">
                            <a  href="{{ route('users.whatsapp') }}" class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled> Continue on whatsapp  <i class="bi bi-whatsapp"></i></a>
                            <!--<a  href="https://wa.link/xe08a5" class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled> Continue <i class="bi bi-whatsapp"></i></a>-->
                        </div>
                   </div>
                
                @else
                    <div class="col-12">
                       <div class="d-grid gap-2 mb-5">
                           <a  href="{{ route('users.whatsapp') }}" class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled> Continue on whatsapp <i class="bi bi-whatsapp"></i></a>
                            <!--<a  href="https://wa.link/xe08a5" class="btn buttonSecondary py-2 dashboard-calculator-note-button-text agreed" disabled>Agree Continue <i class="bi bi-whatsapp"></i></a>-->
                        </div>
                   </div>
                @endif
                
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
       if(e.target.name === 'amount'){
            let equator = target * {{ $output }};
            // let equator = total.value;
            total.value = equator.toFixed(0);
       }else if(e.target.name === 'total'){
            let equator = target / {{ $output }};
            amount.value = equator.toFixed(2);
       }
    }

for(var i = 0; i < agreed.length; i++){
   agreed[i].addEventListener('click', function(){
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
                window.location.replace('/users/express-transaction?message='+response.data.message);
          })
          .catch(function (error) {
            console.log(error);
          });

    }); 
}
    
</script>

@endsection
@push('scripts')

@endpush
