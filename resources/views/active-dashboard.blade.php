<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <nav class="navbar navbar-expand-sm navbar-dark dashboard-navbar-bg">
          <div class="container">
            <a href="#" class="text-ratefy">
                <img src="{{ \App\Models\Setting::find(1)->blog_logo }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">
                            <img src="{{ asset('front/image/seller.png') }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
                            <span class="text-sm text-muted ms-3">(Femiivictorr)</span>
                        </a>
                    </li>
                    
                </ul>
                <a href="#" class="text-ratefy me-3">
                    <img src="{{ asset('front/image/notifiable.png') }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
                </a>
                <form class="d-flex my-2 my-lg-0">
                    {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button> --}}
                </form>
            </div>
      </div>
    </nav>
    <main class="text-white vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 dashboard-sidebar">
                    <div class="row py-4">
                        <div class="col-12 px-0 py-5">
                            <nav class="nav flex-column py-5">
                                <a class="nav-link ratefy-sidebar" href="#">Sell Offers</a>
                                <a class="nav-link ratefy-sidebar" href="#">Buy</a>
                                <a class="nav-link ratefy-sidebar" href="#">Active exchange</a>
                                <a class="nav-link ratefy-sidebar" href="#">Bank Account</a>
                            </nav>
                            <ul class="nav justify-content-center pt-5">
                                <li class="nav-item nav-rectifier">
                                  <a class="nav-link nav-item-extend footerParagraphFonts ratefy-dashboard-sidebar-link" aria-current="page" href="#">Blog</a>
                                </li>
                                <li class="nav-item nav-rectifier">
                                  <a class="nav-link nav-item-extend footerParagraphFonts ratefy-dashboard-sidebar-link" href="#">About</a>
                                </li>
                                <li class="nav-item nav-rectifier">
                                  <a class="nav-link nav-item-extend footerParagraphFonts ratefy-dashboard-sidebar-link" href="#">Fees</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link footerParagraphFonts ratefy-dashboard-sidebar-link">Terms & Condition</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 dashboard-sidebar-icon-frame py-3">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <div class="footer-icon shadow mx-2 ">
                                        <a class="nav-link text-ratefy" aria-current="page" href="https://facebook.com/ratefy">
                                            <i class="fa-brands fa-facebook-f fa-lg"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="footer-icon shadow mx-2 ">
                                        <a class="nav-link text-ratefy" aria-current="page" href="https://facebook.com/ratefy">                               
                                            <i class="fa-brands fa-twitter fa-lg"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="footer-icon shadow mx-2">
                                        <a class="nav-link text-ratefy" aria-current="page" href="https://facebook.com/ratefy">
                                            <i class="fa-brands fa-instagram fa-lg"></i>
                                        </a>
                                    </div>
                                </li>
                              </ul>
                        </div>
                        <div class="col-12 pt-5">
                            <p class="text-center footerParagraphFonts footer-dashboard">
                                Ratefy&copy; {{ date('Y')}}
                            </p>
                        </div>
                    </div>   
                </div>

                <div class="col-md-8 px-5 py-4">
                    <div class="container px-5 mx-auto">
                       <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary dashnoard-active-bar-thin-line py-0 px-0">
                                <div class="container-fluid px-0">
                                  
                                  <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                      <li class="nav-item">
                                        <a class="nav-link active-active dashboard-inner-active-bar" aria-current="page" href="#">Active Exchange</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link dashboard-inner-active-bar" href="#">Past Exchange</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </nav>
                        </div>

                        
                        <div class="col-md-12 my-5">
                            <div class="row mb-3">
                                <div class="col-md-12 my-2">
                                    <div class="row">
                                        <div class="col-md-3 dashboard-activity-devider p-0">
                                            <small class="dashboard-status float-start">Waiting for you to make payment</small>
                                        </div>
                                        <div class="col-md-9 p-0">
                                            <small class="dashboard-timer float-start ms-1">02-03-2023</small>
                                            <small class="dashboard-timer float-end">Order No: 29837339337339337</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dashboard-activity-box">
                                    <div class="row my-3">
                                        <div class="col-1 mb-0 pb-0">
                                            <img src="{{ asset('front/image/payoneer.png') }}"  height="40" alt="Tabler" class="navbar-brand-image">  
                                        </div>
                                        <div class="col-2 mb-0 py-3">
                                            <span class="dashboard-currency me-2">Payoneer</span>
                                            <small class="dashboard-currency-protocall">Transfer</small>
                                        </div>
                                        <div class="col mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Send</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">$100,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Receive</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#72,200.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Rate</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#715,200</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Status</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">Ongoing</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="d-grid gap-2 py-2">
                                                <button class="btn btn-success">view</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 my-2">
                                    <div class="row">
                                        <div class="col-md-3 dashboard-activity-devider p-0">
                                            <small class="dashboard-status float-start">Waiting for you to make payment</small>
                                        </div>
                                        <div class="col-md-9 p-0">
                                            <small class="dashboard-timer float-start ms-1">02-03-2023</small>
                                            <small class="dashboard-timer float-end">Order No: 29837339337339337</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dashboard-activity-box">
                                    <div class="row my-3">
                                        <div class="col-1 mb-0 pb-0">
                                            <img src="{{ asset('front/image/payoneer.png') }}"  height="40" alt="Tabler" class="navbar-brand-image">  
                                        </div>
                                        <div class="col-2 mb-0 py-3">
                                            <span class="dashboard-currency me-2">Payoneer</span>
                                            <small class="dashboard-currency-protocall">Transfer</small>
                                        </div>
                                        <div class="col mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Send</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">$100,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Receive</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#72,200.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Rate</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#715,200</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Status</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">Ongoing</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="d-grid gap-2 py-2">
                                                <button class="btn btn-success">view</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 my-2">
                                    <div class="row">
                                        <div class="col-md-3 dashboard-activity-devider p-0">
                                            <small class="dashboard-status float-start">Waiting for you to make payment</small>
                                        </div>
                                        <div class="col-md-9 p-0">
                                            <small class="dashboard-timer float-start ms-1">02-03-2023</small>
                                            <small class="dashboard-timer float-end">Order No: 29837339337339337</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dashboard-activity-box">
                                    <div class="row my-3">
                                        <div class="col-1 mb-0 pb-0">
                                            <img src="{{ asset('front/image/payoneer.png') }}"  height="40" alt="Tabler" class="navbar-brand-image">  
                                        </div>
                                        <div class="col-2 mb-0 py-3">
                                            <span class="dashboard-currency me-2">Payoneer</span>
                                            <small class="dashboard-currency-protocall">Transfer</small>
                                        </div>
                                        <div class="col mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Send</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">$100,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Receive</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#72,200.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Rate</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#715,200</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Status</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">Ongoing</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="d-grid gap-2 py-2">
                                                <button class="btn btn-success">view</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 my-2">
                                    <div class="row">
                                        <div class="col-md-3 dashboard-activity-devider p-0">
                                            <small class="dashboard-status float-start">Waiting for you to make payment</small>
                                        </div>
                                        <div class="col-md-9 p-0">
                                            <small class="dashboard-timer float-start ms-1">02-03-2023</small>
                                            <small class="dashboard-timer float-end">Order No: 29837339337339337</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dashboard-activity-box">
                                    <div class="row my-3">
                                        <div class="col-1 mb-0 pb-0">
                                            <img src="{{ asset('front/image/payoneer.png') }}"  height="40" alt="Tabler" class="navbar-brand-image">  
                                        </div>
                                        <div class="col-2 mb-0 py-3">
                                            <span class="dashboard-currency me-2">Payoneer</span>
                                            <small class="dashboard-currency-protocall">Transfer</small>
                                        </div>
                                        <div class="col mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Send</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">$100,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Receive</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#72,200.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Rate</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#715,200</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Status</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">Ongoing</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="d-grid gap-2 py-2">
                                                <button class="btn btn-success">view</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 my-2">
                                    <div class="row">
                                        <div class="col-md-3 dashboard-activity-devider p-0">
                                            <small class="dashboard-status float-start">Waiting for you to make payment</small>
                                        </div>
                                        <div class="col-md-9 p-0">
                                            <small class="dashboard-timer float-start ms-1">02-03-2023</small>
                                            <small class="dashboard-timer float-end">Order No: 29837339337339337</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dashboard-activity-box">
                                    <div class="row my-3">
                                        <div class="col-1 mb-0 pb-0">
                                            <img src="{{ asset('front/image/payoneer.png') }}"  height="40" alt="Tabler" class="navbar-brand-image">  
                                        </div>
                                        <div class="col-2 mb-0 py-3">
                                            <span class="dashboard-currency me-2">Payoneer</span>
                                            <small class="dashboard-currency-protocall">Transfer</small>
                                        </div>
                                        <div class="col mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Send</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">$100,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Amount to Receive</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#72,200.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Rate</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">#715,200</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-small">Status</span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="dashboard-rest-box-bg">Ongoing</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0 pb-0">
                                            <div class="d-grid gap-2 py-2">
                                                <button class="btn btn-success">view</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       </div>
                    </div>



                </div>

                
                <div class="col-md-2 d-flex dashboard-right-saidebar-bg">
                    <div class="container d-flex align-items-end">
                        <p class="dashboard-right-sidebar-paragraph text-center">
                            Questions or comments?
                            <span class="text-danger">Drop us a line.</span>
                           </p>
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
  </body>
</html>