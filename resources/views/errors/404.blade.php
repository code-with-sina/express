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
  <body class="bg-ratefy-primary p-0 m-0">
    
    <div class="container-fluid text-white py-5 py-lg-5 m-0">
        <div class="row p-lg-5 m-0">
            <div class="col-12 col-lg-6 py-lg-5 pt-5 py-lg-3 order-lg-2">
                <img src="/front/image/404.png" alt="404" class="img-fluid" />
            </div>
            <div class="col-12 col-lg-6 px-lg-5 py-lg-5 order-lg-1">
              <div class="w-100 ps-lg-5 pt-lg-5">
                <h1 class="pt-5 display-1 text-center text-lg-start"><b>Page <br> Not Found</b></h1>
                <p class="text-center text-lg-start">The page you are looking for doesn't exist</p>

                <div class="w-100 ">
                  <div class="row">
                    <div class="col-12 col-lg-2 d-grid">
                      <a href="https://ratefy.co" class="btn btn-success rounded-5 px-3 m-2 mr-lg-2">Go Home</a>
                    </div>
                    <div class="col-12 col-lg-2 d-grid">
                      <a href="https://ratefy.co/blog" class="btn btn-light rounded-5 px-3 m-2">Blog</a>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
        </div>      
    </div>

    <livewire:scripts />
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('owlcarousel/src/js/owl.carousel.js') }}"></script>     
  </body>
</html>