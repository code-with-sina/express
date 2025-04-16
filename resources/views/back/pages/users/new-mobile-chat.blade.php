<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @vite(['resources/js/app.js', 'resources/js/newchatmobile.js'])
    <livewire:styles />
    <link rel="stylesheet" href="{{ asset('ratefy/mobile-custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
</head>
<body class="m-0 p-0">
    <div class="container-fluid main m-0 p-0">
        <div class="row m-0 p-0">
            @php 
                $props = App\Models\ExpressTransaction::where('order_id', $sessionid)->first();
            @endphp

            <div class="col-12 m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col-6 m-0 py-2 px-2">
                       <a href="{{ route('users.activities') }}" class="top-navigation-left text-white nav-link"><i class="bi bi-chevron-left"></i> Transactions </a> 
                    </div>
                    <div class="col-6 m-0 py-2 px-2">
                        
                        @include('back.chat.count-down')
                    </div>
                </div>
            </div>
    
    
    
            <div class="col-12 p-0 m-0">
                <div class="base-nav">
                    <p class="m-0 p-0 nav-left px-0 py-2 relatiove-navigation-left" id="transaction-chat">
                        TRANSACTION STATUS 
                    </p>
                    <p class="m-0 p-0 nav-right px-0 py-2 relatiove-navigation-right" id="order-detail">
                        ORDER DETAILS
                    </p>
                </div>
            </div>
    
    
            <div class="col-12 m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col-12 content m-0 p-0" id="content-chat">
                        
                        <div class="m-0 p-0 position-relative">
                            <div class="row m-0 p-0">
                                <livewire:new-chat-mobile>
                               
                            </div>



                            <div id="list-message" class="row bg-white chat-div py-2 px-1 m-0">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 content m-0 p-0 py-2" id="content-order">
                        <div class="container-fluid m-0 px-4 ">
                            
                            <div class="row inner-chat-body px-3 py-1">
                                <div class="clo-12 py-1">
                                    @php
                                        $image = \App\Models\ExchangeItem::where('id', $props->wallet_id)->first();
                                    @endphp
                                    <p class="float-end receipt-body p-0 m-0">
                                        Time Created : <b>{{ \Carbon\Carbon::parse($props->created_at)->diffForHumans() }}</b>
                                    </p>
                                    <p class="float-end receipt-body p-0 m-0">
                                        Order Id : <b>{{ substr($props->order_id, 0,  30) }} <i class="bi bi-clipboard-check super"></i></b>
                                    </p>
                                </div>
                                <div class="col-12 m-0">
                                    <div class="container bg-dark">
                                        <div class="row">
                                            <div class="col-12 user-header">
                                                <div class="row">
                                                    <div class="col-3 d-flex align-items-center">
                                                        <div class="recipient-img d-flex align-items-top">
                                                            <img src="/front/image/vend.png" alt="merchant">
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row py-0">
                                                            <p class="text-white user-header-reciept py-0 mb-0">Femiivictorr</p>
                                                        </div>
                                                       
                                                        <div class="row py-0">
                                                            <div class="col-3 py-1 px-1 m-0">
                                                                <p class="text-white user-header-reciept-rated p-0 m-0">
                                                                    136
                                                                </p>
                                                                <p class="text-white user-header-reciept-rated-sub p-0 m-0">
                                                                    Orders
                                                                </p>
                                                            </div>
                                                            <div class="col-5 py-1 px-1 m-0">
                                                                <p class="text-white user-header-reciept-rated p-0 m-0">
                                                                    100%
                                                                </p>
                                                                <p class="text-white user-header-reciept-rated-sub p-0 m-0">
                                                                    Completion
                                                                </p>
                                                            </div>
                                                            <div class="col-4 py-1 px-1 m-0">
                                                                <p  class="text-white user-header-reciept-rated p-0 m-0">
                                                                    90%
                                                                </p>
                                                                <p class="text-white user-header-reciept-rated-sub p-0 m-0">
                                                                    Positive
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 user-header-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="py-2 px-2 text-white inner-header-reciept">
                                                            Transaction Details
                                                        </p>
                                                    </div>
                                                    <div class="col-12 m-0 p-0">
                                                       <div class="row m-0 px-3">
                                                            <div class="col-12 py-2 user-list">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">Exchange Rate</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                   <span class="float-end"> 
                                                                        @php
                                                                            $percentage = $props->conversion_amount / $props->wallet_amount;
                                                                        @endphp
                                                                        ₦ {{ number_format($percentage, 2) }}
                                                                   </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 py-2 user-list">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">E-wallet options</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                   <span class="float-end"> <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $image->image_path ?? '' }}" alt="" class="wallet-img me-1"> {{ $props->wallet_name}} </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 py-2 user-list">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">Payment option</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                   <span class="float-end">  {{ $image->labels }} </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 py-2 user-list">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">Amount to send</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                   <span class="float-end"> ${{ number_format($props->wallet_amount, 2)}} </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 py-2">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">Amount to receive</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                   <span class="float-end"> ₦{{ number_format($props->conversion_amount, 2)}} </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 py-2">
                                                                <p class="text-white user-receipt-list-title py-0">
                                                                    <span class="float-end">Bank Account</span>
                                                                </p>
                                                                <p class="text-white user-receipt-list-subtitle py-0">
                                                                <span class="float-end"> {{ $props->seller_account_number}}({{ $props->seller_bank_name}}) </span>
                                                                </p>
                                                            </div>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 py-2">
                                    <button class="btn report-button  float-end">
                                        Report
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <div  id="transaction-chat-send" class="container justify-content-start z-index position-absolute bottom-0 start-0">
            <div class="row px-2">
                <div class="col-8">
                    <div class="row">
                        <div class="col-2 m-0 p-0">
                            <div class="bot-img m-0 p-0">
                                <img src="/front/image/bot.svg" alt="bot">
                            </div>
                        </div>
                        <div class="col-10 position-relative m-0 p-0">
                            <div class="row">
                            <div class="col-12 py-1">
                                <div class="made-payment m-0 p-0 d-none" id="payment-detail-toggler">
                                    <div class="pup-made-payment">
                                        <div class="row m-0 p-0">
                                            <div class="col-12">
                                                <i class="bi bi-x float-end" id="made-payment-button"></i>
                                            </div>

                                            <form id="file_form" enctype="multipart/form-data">
                                                <div class="col-12 py-3" >
                                                    <div class="row  m-0 p-0">
                                                        <div class="col-12  m-0 p-0">
                                                            <p>
                                                                Kindly attach <strong> proof of payment </strong> and click <strong> ‘I’ve made payment’</strong> button
                                                            </p>
                                                        </div>
                                                        @if ($props->pop_path !== null)
                                                        <div class="col-12  m-0 p-0">
                                                            <p>  {{ substr($props->pop_path, 0,  15) }}... </p>
                                                        </div>
                                                        @else 
                                                        <div class="col-12 m-0 p-0">

                                                            <label for="attach-file">
                                                                <input type="file" name="" id="attach-file" hidden>
                                                                <div class="attach-file px-1" style="width: 130px !important;">
                                                                    <p id="pop" class="text-truncate text-center">   {{ 'attach file' }} </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </div>    
                                                </div>
                                                <div class="d-flex justify-content-center d-none" id="payLoader">
                                                    <div class="spinner-grow m-2" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    @if ($props->pop_path == null)
                                                        <span class="made-payment-button" id="madePay"> I’ve made payment </span>
                                                    @endif
                                                </div>

                                            </form>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12 py-2 px-2 made-payment" id="made-payment-toggler">
                                    I’ve made payment 
                                </div>
                            </div>
                                <div class="col-12 py-1">
                                    <div class="cancel-payment m-0 p-0 d-none" id="cancel-detail-toggler">
                                        <div class="pup-cancel-payment">
                                            <div class="row m-0 p-0">
                                                <div class="col-12">
                                                <i class="bi bi-x float-end" id="cancel-payment-button"></i>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <p>
                                                        Canceling this transaction will affect your order completion rate which might discourage people from initiating a transaction with you.
                                                    </p>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex justify-content-center d-none" id="cancelLoader">
                                                        <div class="spinner-grow m-2" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                    <p class="cancel-payment-button px-1" id="cancelPay"> Cancel this transaction  </p>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="cancel-payment" id="cancel-payment-toggler">
                                        Cancel this transaction
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0 py-2">
                <form id="form" class="w-100 m-0 p-0">
                    <div class="row">
                        <div class="col-10 bg-white m-0 p-0">
                            <div class="input-group m-0 p-0">
                                <input type="text" class="form-control  border border-end-0 rounded-start-pill" aria-label="Dollar amount (with dot and two decimal places)" id="input-message">
                                <span class="input-group-text border border-start-0 bg-white rounded-end-circle"><img src="/front/image/emoji.svg" alt="emoji"></span>
                            </div>
                        </div>
                        <div class="col-2 bg-white d-flex align-items-center m-0 p-0">
                            <img src="/front/image/send.svg" alt="send" class="m-0 px-1" id="send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

        @if(auth()->user()->id !== null)
            <span id="node_id" class="d-none invisible">
                {{ auth()->user()->id }}
            </span>
            <span class="d-none invisible" id="user_id">
                {{ auth()->user()->id }}
                
            </span>
            <span class="d-none invisible" id="session_id">
                {{ $sessionid }}
            </span>
        @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable px-3">
        <div class="modal-content rounded-0 feedback p-0 m-0">
            <div class="modal-header border border-0 d-flex justify-content-end py-2">
                <!-- <i class="bi bi-x-lg text-white" data-bs-dismiss="modal" aria-label="Close"></i> -->
            </div>
            <div class="modal-body border border-0 pb-5 mb-2">
                    <form id="dafeedback">
                        <div class="row">
                            <div class="col-12 px-5">
                                <p class="text-center feedback-title">How was your trading experience?</p>
                            </div>
                            <div class="col-12 d-flex justify-content-between px-5">
                                <button type="button" id="positive" class="feedback-positive btn">Positive</button>
                                <button type="button" id="negative" class="feedback-negative btn">negative</button>
                            </div>
                            <div class="col-12 px-1">
                                <div class="mb-3 px-5">
                                <label for="" class="form-label"></label>
                                <textarea class="form-control feadback-text" name="description" id="description" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12 px-1">
                                <div class="px-5 d-grid">
                                    <button type="button" id="submitFeedBack" class="btn btn-secondary">Leave Feedback</button>
                                </div>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div id="error-cover" class="modal-body border border-0 pb-5 mb-2 d-none">
                    <p id="errors" class="rounded-3 px-3 py-2 bg-danger text-white"></p>
                </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="thanksFeedBack" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="thanksFeedBack" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable px-5">
            <div class="modal-content rounded-0 feedback p-0 m-0">
                <div class="modal-header border border-0 d-flex justify-content-end py-2">
                    <i class="bi bi-x-lg text-white" data-bs-dismiss="modal" id="goHome" aria-label="Close"></i>
                </div>
                <div class="modal-body border border-0 pb-5 mb-2">
                    <p class="text-center fs-2">Your feedback has been submitted!</p>
                    <p class="text-center"><button type="button" id="positive" class="feedback-positive btn text-center">Positive</button></p>
                    <p class="text-center small-text text-secondary px-5">Absolutely fast and polite. I will use next time.</p>
                </div>
            </div>
            </div>
        </div>

    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>

        let transactChat        = document.getElementById("transaction-chat");
        let orderDetail         = document.getElementById("order-detail");
        let transactChatSend    = document.getElementById("transaction-chat-send");

        let contentChat         = document.getElementById("content-chat");
        let contentOrder        = document.getElementById("content-order");

        transactChat.addEventListener("click", function(e) {
            contentChat.style.transform         = "translateX(0)";
            transactChatSend.style.transform    = "translateX(0)";
            contentOrder.style.transform        = "translateX(100%)";

            contentChat.style.transitionDelay         = "0.3s";
            transactChatSend.style.transitionDelay    = "0.6s";
            contentOrder.style.transitionDelay        = "0s";
        });
        orderDetail.addEventListener("click", function(e) {
            contentChat.style.transform         = "translateX(100%)";
            transactChatSend.style.transform    = "translateX(100%)";
            contentOrder.style.transform        = "translateX(0)";

            contentChat.style.transitionDelay         = "0s";
            transactChatSend.style.transitionDelay    = "0s";
            contentOrder.style.transitionDelay        = "0.3s";
        });
    </script>


    <script>

        const form = document.querySelector('#dafeedback');
        let feedstatus = null;
        let feedPositive = document.getElementById('positive');
        let feedNegative = document.getElementById('negative');

        const newId = document.getElementById('session_id');
        const sessionId = newId.innerHTML;

        let descriptionFeedBack = form.elements.namedItem('description');


        let showFeedBack = new bootstrap.Modal("#exampleModal");
        let thanksFeedBack = new bootstrap.Modal("#thanksFeedBack");
        let goHome = document.getElementById("goHome");

        let payment = document.getElementById("made-payment-toggler");
        let paymentButton = document.getElementById("made-payment-button");
        let paymentDetail = document.getElementById("payment-detail-toggler");
        let showPayLoading = document.getElementById("madePay");
        let payLoader = document.getElementById("payLoader");


        let cancelPayment = document.getElementById("cancel-payment-toggler");
        let cancelPaymentButton = document.getElementById("cancel-payment-button");
        let cancelPaymentDetail = document.getElementById("cancel-detail-toggler");
        let showCancelLoading = document.getElementById("cancelPay");
        let cancelLoader = document.getElementById("cancelLoader");

        let errorContainer = document.getElementById("error-cover");
        let feedError = document.getElementById("errors");


        feedPositive.addEventListener("click", function(){
            feedstatus = 'positive';
            feedPositive.classList.toggle('disabled');
            if(feedNegative.classList.toggle('disabled')){
                feedNegative.classList.toggle('disabled');
            }
        });

        feedNegative.addEventListener("click", function(){
            feedstatus = 'negative';
            feedNegative.classList.toggle('disabled');
           
            if( feedPositive.classList.toggle('disabled')){
                feedPositive.classList.toggle('disabled');
            }

        });

        goHome.addEventListener("click", function(){
            window.location.href = `home`;
        });

        submitFeedBack.addEventListener("click", function(){
            if(!feedstatus){
                errorContainer.classList.toggle('d-none');
                feedError.textContent = "Kindly choose a positive or negative feedback status button";
            }else {
                if(!descriptionFeedBack.value){
                    errorContainer.classList.add('d-block');
                    feedError.textContent = "Hey! The description area cannot be empty";
                }else {
                    errorContainer.classList.add('d-none');
                    axios.post('/users/feedback', {
                        sessionId: sessionId.trim(),
                        status: feedstatus,
                        description: descriptionFeedBack.value,
                    }).then((response) => {
                        if(response.status == 200) {
                            console.log("good");
                            showFeedBack.hide();
                            thanksFeedBack.show();
                        }
                    });
                }
            }
        });

        payment.addEventListener("click", function(){
            
            if(paymentDetail.classList.toggle("d-none")){
                payment.classList.toggle("d-block");
            }else {
                payment.classList.toggle("d-none");
            }
            
        });

        paymentButton.addEventListener("click", function(){

            if(payment.classList.toggle("d-none")){
                paymentDetail.classList.toggle("d-block");
            }else {
                paymentDetail.classList.toggle("d-none");
            }
            
        });

        cancelPayment.addEventListener("click", function(){
            
            if(cancelPaymentDetail.classList.toggle("d-none")){
                cancelPayment.classList.toggle("d-block");
            }else {
                cancelPayment.classList.toggle("d-none");
            }
            
        });

        cancelPaymentButton.addEventListener("click", function(){

            if(cancelPayment.classList.toggle("d-none")){
                cancelPaymentDetail.classList.toggle("d-block");
            }else {
                cancelPaymentDetail.classList.toggle("d-none");
            }

        });

        showCancelLoading.addEventListener("click", function(){
            cancelLoader.classList.toggle("d-none");
        });

        showPayLoading.addEventListener("click", function(){
            payLoader.classList.toggle("d-none");
        });

        $(document).ready(function () {
            let popFile =   document.getElementById("attach-file");
            popFile.addEventListener("change", function(){
            if(popFile.files.length == 0 ){
                    console.log("no files selected");
                }else{
                    let capSize = 2097152;
                    let fileSizeByte = popFile.files[0].size;
                    if(fileSizeByte < capSize){
                        if(popFile.files[0].type == "image/jpeg" || popFile.files[0].type == "image/png" ){
                            $("#pop").text(popFile.files[0].name);
                        }else {
                            alert("You are not upload an image file");
                        }
                    }else{
                        alert("File is more than 2 mb");
                    }                      
                }  
            });
        });


        madePay.addEventListener('click', () => {
            axios.post('pop-payment/pay-approval', {
                image: document.querySelector('#attach-file').files[0],
                session: "{{ __($props->order_id) }}"
            }, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                if(response.status == 200)
                {
                    madePay.classList.add("d-none");
                    payLoader.classList.toggle("d-none");
                }
                console.log(response.data.msg);
            });
        });

    </script>
</body>
</html>