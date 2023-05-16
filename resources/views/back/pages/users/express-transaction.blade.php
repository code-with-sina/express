<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('ratefy/style.css')}}">

    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    @vite(['resources/js/app.js', 'resources/js/client-express-chat.js'])
    <livewire:styles />
    
</head>
<body class="bg-ratefy-primary">
    <span class="invisible" id="session_id">
        {{ $sessionid }}
    </span>
    <main class="container-fluid text-white mx-0 my-0 py-0 px-0">
        {{-- Navigation --}}
        <div class="continer-fuild">
            <div class="flex">
                <div class="d-flex">
                    <div class="d-flex justify-content-start my-2 py-2">
                        <a href="{{ route('users.home') }}" class="text-white"><i class="bi bi-arrow-left expressTransaction-navigation"></i></a>
                    </div>
                    <div class="d-flex py-4">
                        <span class="d-flex justify-content-center text-nav pt-md-2">Home</span>
                    </div>   
                </div>
            </div>
        </div>
        {{-- Status and CountDown --}}
        <livewire:express-transaction-top-status>
        @php 
            $props = App\Models\ExpressTransaction::where('order_id', $sessionid)->first();
        @endphp
        {{-- Main Activity --}}
        <div class="container-fluid">
            <div class="container px-0 px-sm-0 px-md-5 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-12 px-0 mb-3">
                                    <livewire:express-transaction-bar>
                                </div>

                                <div class="col-12 my-1">
                                    <h4 class="order-info">Order Info</h4>
                                    <div class="card rounded-2 text-dark">
                                        <div class="card-body px-2 px-sm-2 px-md-5 py-3">
                                            <div class="row p-0 m-0 mb-2">
                                                <div class="col-1 px-0 py-1">
                                                    <img src="{{ asset('front/image/Payoneer.png') }}" alt="" class="card-order-info">
                                                </div>
                                                <div class="col-3 px-0 ms-1">
                                                    <span class="fw-bold order-card-item">
                                                        {{ $props->wallet_name}}
                                                    </span>
                                                   
                                                </div>
                                                <div class="col-3 px-0 py-1">
                                                    <span class="exchange-rate-dashboard-subtitle">
                                                        Transfer
                                                    </span>
                                                    
                                                </div>
                                                <div class="col-4 px-0">
                                                    <span class="order-card-amount p-0">
                                                        ₦  {{   __($props->conversion_amount / $props->wallet_amount)}}
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                            <hr class="hr-rule">
                                            <div class="row my-3">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-5 my-2">
                                                            <span class="order-card-send-title"> Amount to send </span>
                                                            <span class="order-card-send-amount">${{ $props->wallet_amount}}.00</span>
                                                        </div>
                                                        <div class="col-6 my-2">
                                                            <span class="order-card-send-title"> Amount to send </span>
                                                            <span class="order-card-send-amount">₦{{ $props->conversion_amount}}.00</span>
                                                        </div>
                                                        <div class="col-12 my-2">
                                                            <span class="order-card-send-title"><i class="bi bi-bank2 text-ratefy"></i> Bank Account </span>
                                                            <br>
                                                            <div class="order-card-bank">{{ $props->seller_account_number}}({{ $props->seller_bank_name}})</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <livewire:seller-note>
                                <div class="col-12 my-2">
                                    <h4 class="seller-note">Prove of Payment</h4>
                                    <div class="border border-secondary rounded-1  px-0 px-sm-0 px-md-3 py-2">
                                        <span>
                                            <form id="file_form" enctype="multipart/form-data">
                                                <label for="upload-photo"><i class="bi bi-paperclip"></i></label>
                                                <input type="file" name="" id="upload-photo">
                                                <button class="btn btn-secondary rounded-5" id="submitpop">Submit prove</button> 

                                                @if ($props->pop_path !== null)
                                                <span id="pop_path">{{ $props->pop_path }}</span>
                                                @endif
                                                
                                            </form>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 my-2">
                                    <div class="row">
                                        <div class="col-4 d-grid">
                                           <button class="btn btn-secondary rounded-5 py-1 order-card-button">CANCEL</button> 
                                        </div>
                                        <div class="col-8 d-grid">
                                            <button class="btn btn-success rounded-5 py-1 order-card-button" id="madePay">I’VE MADE PAYMENT </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 py-3">
                       
                      <livewire:express-chat-congrat-activity>
                    </div>
                </div>
            </div>
        </div>
        {{-- FAQS --}}
        <div class="container-fluid py-5 border-extended vh-100">
            <div class="container">
                <div class="row my-3">
                    <h1 class="float-start ratefy-faq">FAQ</h1>
                </div>
                <div class="row">
                    <div class="card bg-ratefy-secondary mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3" data-bs-toggle="collapse" href="#firstaccordion" role="button" aria-expanded="false" aria-controls="firstaccordion">
                                    <h3 class="heading-ratefy-h3" >
                                        What if I click “I’ve made payment” button without making any Payment?
                                        <span class="triangle-down float-end"></span>
                                    </h3>
                                </div>
                                <div class="col-md-12 accordion-collapse collapse" id="firstaccordion">
                                    <p class="paragraph-ratefy-p2-elegant" >
                                        By laying false claim, you put your account on the risk of being  disabled and you might not be a ble to use this planform at any time in the future. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-ratefy-secondary mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3" data-bs-toggle="collapse" href="#secondaccordion" role="button" aria-expanded="false" aria-controls="secondaccordion">
                                        <h3 class="heading-ratefy-h3">
                                            What should I do after making payment?
                                        <span class="triangle-down float-end"></span>
                                    </h3>
                                </div>
                                <div class="col-md-12 mb-3 accordion-collapse collapse" id="secondaccordion">
                                    <p class="paragraph-ratefy-p2-elegant">
                                        After the payment has been successfully made, click “I’ve made payment” button and wait for the receiver to confirm your payment. 
                                        You will receive Naira to your bank account few minutes after your payment is confirmed.
                                    </p>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="card bg-ratefy-secondary mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3 " data-bs-toggle="collapse" href="#thirdaccordion" role="button" aria-expanded="false" aria-controls="thirdaccordion">
                                        <h3 class="heading-ratefy-h3 mb-2">
                                            What should I do if I did not receive Naira on time?
                                        <span class="triangle-down float-end"></span>
                                    </h3>
                                </div>
                                <div class="col-md-12 mb-3 accordion-collapse collapse" id="thirdaccordion">
                                    <p class="paragraph-ratefy-p2-elegant">
                                        All Naira disbursement is made through Ratefy escrow. You can contact Ratefy support for quick assistance and rectification
                                    </p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> 
        </div>
            <!-- Full screen modal -->
        <div class="modal modal-sm" 
                    id="chat-modal" 
                tabindex="1" 

            aria-labelledby="modal-title"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border border-success text-dark rounded-4 my-auto" style="">
                    <div class="modal-header p-2">
                        <div class="modal-title">
                            
                            <small>{{ auth()->user()->username}}</small>
                            
                        </div>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-1">
                        <div class="content" id="list-message" style="height: 82vh; overflow-y:auto;">

                        </div>
                        <div class="chat-form">
                            <form id="form" class="mx-0 px-0 w-100">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 border border-success" id="input-message" name="message" placeholder="start type..." autofocus autocomplete="off" style="width: 80%;">
                                    <span class="input-group-text bg-white border border-0 common" id="send"><i class="bi bi-send text-ratefy"></i></span>
                                    <span class="input-group-text bg-white border border-0 common" id="upload"><i class="bi bi-paperclip text-ratefy"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <span class="invisible" id="session_id">
                {{ $sessionid }}
            </span>
            <div id="node_id" class="invisible">
                {{ auth()->user()->id }}
            </div>
            <div class="invisible" id="user_id">
                {{ auth()->user()->id }}
            </div>
        </div>
    </main>




    <livewire:scripts />
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('back/admin-js/countdown.js')}}"></script> 
    <script>
        let submitPop   = document.getElementById('submitpop');
        let fileForm    = document.getElementById('file_form');
        let file        = document.querySelector('#upload-photo').files;
        let madePay     = document.getElementById('madePay');
        let popPath     = document.getElementById('pop_path');        
        
        fileForm.addEventListener('submit', (event) => {
            event.preventDefault();
            axios.post('pop-payment/prove', {
                image: document.querySelector('#upload-photo').files[0],
                session: "{{ __($props->order_id) }}"
            }, {
                 headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                if(response.status == 200){
                    popPath.innerHTML = response.data.msg;
                }
                console.log(response.data.msg);
            });
        });

        madePay.addEventListener('click', () => {
            axios.post('pop-payment/approval', {
                session: "{{ __($props->order_id) }}"
            }, {
                 headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                
                console.log(response.status);
            });
        });


    </script>
    <script>
        ;(function($) {
     
            var MERCADO_JS = {
                init: function(){
                    this.mercado_countdown();
                }, 
                mercado_countdown: function() {
                if($(".mercado-countdown").length > 0){
                        $(".mercado-countdown").each( function(index, el){
                        var _this = $(this),
                        _expire = _this.data('expire');
                        _this.countdown(_expire, function(event) {
                            $(this).html( event.strftime('<span><span class="boxes">%-H</span> : <span class="boxes">%M</span> : <span class="boxes">%S</span>'));
                            console.log(event);
                        });
                    });
                }
            },
    
        }
    
      window.onload = function () {
         MERCADO_JS.init();
      }
    
      })(window.Zepto || window.jQuery, window, document);
    </script>
    <script>
        function checkDevice (){
         let width = window.innerWidth;
         let height = window.innerHeight;

         if(width < 400 && height < 800) {
            window.location.href = `mobile/express-transaction?message={{ $sessionid }}`;
         }
        }
        checkDevice();
     </script>
</body>
</html>