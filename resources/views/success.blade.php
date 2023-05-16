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
    <link rel="stylesheet" href="{{ asset('ratefy/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    @vite(['resources/js/app.js'])
    <livewire:styles />
  </head>
  <body class="bg-ratefy-primary p-0">

      
            @if(Session::get('success')  || Session::get('fail'))
                <main class="d-flex vh-100">
                    <div class="d-flex align-items-center text-white vw-100">
                       <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 px-4">
                                <div class="row">
                                    <div class="col-12 ratefy-auth-tops bg-ratefy-secondary text-center py-3">
                                        <a href="#" class="text-ratefy">
                                            <img src="{{ \App\Models\Setting::find(1)->blog_logo }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
                                        </a>
                                    </div>
                                    <div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
                                        <div class="row px-4">
                                            <div class="col-12 my-2">
                                                
                                                @if (Session::get('success'))
                                                    <h2 class="heading-ratefy-h1 text-center">
                                                        <span class="ratefy-gradient">
                                                             Success
                                                        </span>
                                                    </h2>
                                                @endif
            
                                                @if (Session::get('fail'))
                                                    <h2 class="heading-ratefy-h1 text-center">
                                                        <span class="ratefy-gradient">
                                                             failed
                                                        </span>
                                                    </h2>
                                                @endif
                                                
                                               
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <!--<div class="col-12 text-center  my-2">-->
                                                    <!--    <i class="bi bi-check2-square display-3 text-ratefy"></i>-->
                                                    <!--</div>-->
                                                    <!--<div class="col-12 text-center  my-2">-->
                                                    <!--    <i class="bi bi-exclamation-square display-4 text-ratefy"></i>-->
                                                    <!--</div>-->
                                                    
                                                    @if (Session::get('success'))
                                                        <div class="col-12 text-center  my-2">
                                                            <i class="bi bi-check2-square display-3 text-ratefy"></i>
                                                        </div>
                                                    @endif
                
                                                    @if (Session::get('fail'))
                                                        <div class="col-12 text-center  my-2">
                                                            <i class="bi bi-exclamation-square display-4 text-ratefy"></i>
                                                        </div>
                                                    @endif
                                                  
                                                </div>
                                                <div class="row justify-content-center">
                                                   
                                                    <div class="col-8  my-2">
                                                        @if (Session::get('success'))
                                                            <p class="paragraph-ratefy-p2">
                                                               {{ Session::get('success') }}
                                                            </p>
                                                        @endif
                                                        
                                                        @if (Session::get('fail'))
                                                            <p class="paragraph-ratefy-p2">
                                                                {{ Session::get('fail') }}
                                                            </p>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2 mt-5">
                                                    <a href="{{ route('users.login') }}" class="btn btn-primary py-2 rounded-5 button-bg" type="button">
                                                        <span class="ratefy-auth-paragraphs">Login</span> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </main>
        @else
            <script>window.location = "/users/login";</script>
        @endif
    <livewire:scripts />
  </body>
</html>