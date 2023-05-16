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
                        <h4 class="dashboard-heading-h2">
                            Get Receiving Amount  And <span class="ratefy-gradient">Exchange Fund</span>
                        </h4>
                        <p class="dashboard-paragraph-p1">
                            Use this straightforward Calculator to know your potential receiving amount and continue with the exchange
                        </p>
                        <div class="container">
                            <div class="bg-white dashboard-calculator-header py-4 px-5 text-dark">
                                <div class="row px-3">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-1 py-4">
                                                <img src="{{ asset('front/image/payoneer.png')}}" class="w-100 img-fluid">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="dashboard-calculator-rate"> Payoneer </span>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="dashboard-calculator-subtitle">$499 or less</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 py-4">
                                                <span class="dashboard-currency-protocall float-start">Transfer</span>
                                            </div>
                                            <div class="col-md-7 py-3">
                                                <span class="float-end dashboard-calculator-rate"> ₦ 715.00 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-calculator-footer py-4 px-5 text-dark">
                                <div class="row px-3">
                                    <div class="col-md-12">
                                        <span for="" class="dashboard-calculator-label">Amount to Send</span>
                                        <div class="input-group my-3">
                                            <span class="input-group-text border border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3"><i class="bi bi-currency-dollar"></i></span>
                                            <input type="text" class="form-control form-control-lg py-2 border border-0 bg-white" aria-label="Amount (to the nearest dollar)" placeholder="eg. 100">
                                            <span class="input-group-text border border-0 rounded-end dashboard-calculator-form px-3 dashboard-calculator-form-right-icon">.00</span>
                                        </div>
                                        <span for="" class="dashboard-calculator-label">Amount to Recieve</span>
                                        <div class="input-group my-3">
                                            <span class="input-group-text border-0 rounded-start dashboard-calculator-form dashboard-calculator-form-left-icon px-3">₦</span>
                                            <input type="text" class="form-control form-control-lg py-2 border border-0 bg-white" aria-label="Amount (to the nearest dollar)" placeholder="eg. 143,000...">
                                            <span class="input-group-text border-0 rounded-end dashboard-calculator-form dashboard-calculator-form-right-icon px-3">.00</span>
                                        </div>
                                    
                                    </div>
                                    <span class="dashboard-calculator-form-emphasis mb-2">You will get the same amount. No Hidden fee</span>
                                    <div class="col-md-12 d-grid gap-2">
                                        <button class="btn buttonSecondary dashboard-calculator-button-text py-2"><span class="">SELL NOW  <i class="bi bi-chevron-down"></i></span></button>
                                    </div>
                                    <div class="col-md-12">
                                    
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