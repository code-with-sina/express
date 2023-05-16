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
    <main class="d-flex vh-100">
        <div class="d-flex align-items-center text-white vw-100">
           <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 px-4">
                    <div class="row">
                        <div class="col-12 py-3 px-0">
                            <i class="bi bi-arrow-left fs-2"></i>
                        </div>
                        <div class="col-12 ratefy-auth-tops bg-ratefy-secondary text-center py-3">
                            <a href="#" class="text-ratefy">
                                <img src="{{ \App\Models\Setting::find(1)->blog_logo }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
                            </a>
                        </div>
                        <div class="col-12 ratefy-auth-bottoms py-3 bg-white text-dark">
                            <div class="row px-4">
                                <div class="col-12">
                                    <h2 class="heading-ratefy-h1">
                                        <span class="form-ratefy">
                                            Sign in
                                        </span>
                                        <span class="ratefy-gradient">
                                            account
                                        </span>
                                    </h2>
                                    <p class="paragraph-ratefy-p2">
                                        Sign in to continue!
                                    </p>
                                </div>
                                <div class="col-12">
                                    <form action="" method="post" class="mb-3">
                                        <div class="input-group mb-5">
                                            <span class="input-group-text  border border-end-0 rounded-start bg-white px-3" id="basic-addon1"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control form-control-lg  border border-start-0 rounded-end bg-white" placeholder="Loki Loyfenson" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text border border-end-0 rounded-start bg-white px-3"><i class="bi bi-lock"></i></span>
                                            <input type="text" class="form-control form-control-lg border border-0 border-top border-bottom bg-white" aria-label="Amount (to the nearest dollar)" placeholder="Password">
                                            <span class="input-group-text border border-start-0 rounded-end bg-white px-3"><i class="bi bi-eye"></i></span>
                                        </div>
                                        <small>
                                            <span class="ratefy-auth-paragraphs">Forgot Password?</span> <a href="#" class="ratefy-auth-links">Click here</a>
                                        </small>
                                        
                                        <div class="d-grid gap-2 mt-5">
                                            <button class="btn btn-primary py-2 rounded-5 button-bg" type="button">Sign in</button>
                                        </div>
                                    </form>
                                    <p class="text-center">
                                        <span class="ratefy-auth-paragraphs">Don't have an account?</span> <a href="#" class="ratefy-auth-links">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </main>
    <livewire:scripts />
  </body>
</html>