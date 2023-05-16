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
    @vite(['resources/js/app.js'])
    <livewire:styles />
</head>
<body class="bg-ratefy-primary">
    <main class="container-fluid text-white mx-0 my-0 py-0 px-0">
        {{-- Navigation --}}
        <div class="continer-fuild">
            <div class="flex">
                <div class="d-flex">
                    <div class="d-flex justify-content-start my-2 py-2">
                        <a href="{{ route('users.home') }}" class="text-white"><i class="bi bi-arrow-left expressTransaction-navigation"></i></a>
                    </div>
                    <div class="d-flex py-4">
                        <span class="d-flex justify-content-center text-nav pt-2">Home</span>
                    </div>   
                </div>
            </div>
        </div>
        {{-- Status and CountDown --}}
        <div class="continer-fuild awaiting-confirmation-status-and-countdown">
            <div class="container px-0 px-sm-0 px-md-5 py-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="heading">
                            Awaiting Confirmation
                        </h4>
                        <p class="paragraph">
                            The order is created. Please, go through the instruction.
                            <span class="boxes">1</span>
                            <span class="boxes">2</span>
                            :
                            <span class="boxes">4</span>
                            <span class="boxes">4</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 my-1">
                                <small class="float-end">
                                    <span class="order-stamps">
                                        Order number:
                                    </span>
                                   
                                    <span class="order-stamps-details">
                                        0002272292272278 <i class="bi bi-clipboard-check super"></i>
                                    </span>
                                </small>
                            </div>
                            <div class="col-md-12 my-1">
                                <small class="float-end">
                                    <span class="order-stamps">
                                        Time created: 
                                    </span>
                                    <span class="order-stamps-details">
                                        2023-03-31  20:30:12
                                    </span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Main Activity --}}
        <div class="container-fluid">
            <div class="container px-0 px-sm-0 px-md-5 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 px-0 mb-3">

                                    <div class="progressbar-wrapper px-0">
                                        <ul class="progressbar px-0 mx-0">
                                            <li class="active"> Payment</li>
                                            <li class="active">Awaiting Confirmation</li>
                                            <li class="">Completed</li>
                                        </ul>
                                        <ul class="overlay">
                                            <li class="li inner-progress">
                                                1
                                            </li>
                                            <li class="li inner-progress">
                                                2
                                            </li>
                                            <li class="li inner-progress">
                                                3
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="col-12 my-1">
                                    <h4 class="order-info">Order Info</h4>
                                    <div class="card rounded-2 text-dark">
                                        <div class="card-body px-5 py-3">
                                            <div class="row mb-4">
                                                <div class="col-1 px-0 py-1">
                                                    <img src="{{ asset('front/image/Payoneer.png') }}" alt="" class="w-100">
                                                </div>
                                                <div class="col-3 ps-1">
                                                    <span class="fw-bold float-start order-card-item">
                                                        Payoneer
                                                    </span>
                                                   
                                                </div>
                                                <div class="col-3 py-3">
                                                    <div class="exchange-rate-dashboard-subtitle">
                                                        Transfer
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-3">
                                                </div>
                                                <div class="col-2">
                                                    <span class="order-card-amount float-end">
                                                        ₦755
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                            <hr class="hr-rule">
                                            <div class="row my-3">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-5 my-2">
                                                            <span class="order-card-send-title"> Amount to send </span>
                                                            <span class="order-card-send-amount">$100.00</span>
                                                        </div>
                                                        <div class="col-5 my-2">
                                                            <span class="order-card-send-title"> Amount to send </span>
                                                            <span class="order-card-send-amount">#72,200.00</span>
                                                        </div>
                                                        <div class="col-12 my-2">
                                                            <span class="order-card-send-title"><i class="bi bi-bank2 text-ratefy"></i> Bank Account </span>
                                                            <br>
                                                            <div class="order-card-bank">8064530382(PalmPay)</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 my-2">
                                    <h4>Confirmation Note</h4>
                                    <div class="border border-secondary rounded-1 px-3 py-2">
                                        <p>
                                            It takes about 7 minutes for Payoneer transfer to be received. I’m currently checking your payment. Kindly wait patiently
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 my-2">
                                    <div class="row">
                                        <div class="col-4 d-grid">
                                           <button class="btn btn-secondary rounded-5 py-1 order-card-button">CANCEL</button> 
                                        </div>
                                        <div class="col-8 d-grid">
                                            <button class="btn btn-success rounded-5 py-1 order-card-button">I’VE MADE PAYMENT </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-3">
                        <div class="container-fluid text-dark">
                           <div class="card rounded-4 w-100">
                            <div class="card-body px-2 py-2 justify-content-start">
                                <div class="row px-4">
                                    <div class="col-1 p-0 m-0">
                                       <img src="{{ asset('front/image/Payoneer.png') }}" alt="" class="w-50">
                                    </div>
                                    <div class="col-3">
                                        <span class="float-start chat-username py-1">
                                           {{ __(auth()->user()->username) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-dark px-3 py-0">
                               <div class="container-fluid px-3 py-3 m-0">

                                <div class="row">
                                    <div class="col-12 my-2">
                                        <div class="row justify-content-start">
                                            <div class="col-1 p-0">
                                                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" srcset="">
                                            </div>
                                            <div class="col-8">
                                                <div class="message-left">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="row justify-content-end">
                                            <div class="col-8">
                                                <div class="message-right">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                                    Totam cumque voluptatibus labore maiores officia laborum doloremque beatae minus, 
                                                    necessitatibus adipisci optio deleniti? Atque incidunt, consequatur veniam quia voluptates fugit assumenda.
                                                </div>
                                            </div>
                                            <div class="col-1 p-0">
                                                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 my-2">
                                        <div class="row justify-content-start">
                                            <div class="col-1 p-0">
                                                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" srcset="">
                                            </div>
                                            <div class="col-8">
                                                <div class="message-left">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                                    necessitatibus adipisci optio deleniti? Atque incidunt, consequatur veniam quia voluptates fugit assumenda.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="row justify-content-end">
                                            <div class="col-8">
                                                <div class="message-right">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                                </div>
                                            </div>
                                            <div class="col-1 p-0">
                                                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-2">
                                        <div class="row justify-content-start">
                                            <div class="col-1 p-0">
                                                <img src="{{ asset('front/image/Payoneer.png') }}" alt="" srcset="">
                                            </div>
                                            <div class="col-8">
                                                <div class="message-left">
                                                    Lorem ipsum, dolor sit amet. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               </div>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" id="form">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-0" id="message" name="message" placeholder="start type...">
                                        <span class="input-group-text bg-white border border-0 common" id="send"><i class="bi bi-send text-ratefy"></i></span>
                                        <span class="input-group-text bg-white border border-0 common" id="upload"><i class="bi bi-paperclip text-ratefy"></i></span>
                                    </div>
                                </form>
                            </div>
                           </div>
                        </div>
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
                                <div class="col-md-12" id="firstaccordion">
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
                                <div class="col-md-12 mb-3" id="secondaccordion">
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
                                <div class="col-md-12 mb-3" data-bs-toggle="collapse" href="#thirdaccordion" role="button" aria-expanded="false" aria-controls="thirdaccordion">
                                        <h3 class="heading-ratefy-h3 mb-2">
                                            What should I do if I did not receive Naira on time?
                                        <span class="triangle-down float-end"></span>
                                    </h3>
                                </div>
                                <div class="col-md-12 mb-3" id="thirdaccordion">
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
    </main>
    <livewire:scripts />
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('owlcarousel/src/js/owl.carousel.js') }}"></script>    
    <script>
        const collapseElementList = document.querySelectorAll('.collapse')
        const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl))
    </script>

    <script>
        const form = document.querySelector('#form');
        let send = document.getElementById("send");
        let message = form.elements.namedItem("message");
        form.addEventListener('submit', function (e){
            e.preventDefault();
            message.value = '';
        });

        send.addEventListener("click", function () {
            alert('hey you clicked me! ~:) ');
        });
    </script>
</body>
</html>