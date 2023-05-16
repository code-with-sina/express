<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ blogInfo()->blog_description }}">
    <meta name="author" content="{{ blogInfo()->blog_name }}">
    @yield('meta_tags')
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('ratefy/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    
    <meta name="robot" content="index,follow" />
    <meta name="title" content="{{ blogInfo()->blog_name }}" />
    <meta name="description" content="{{ blogInfo()->blog_description }}" />
    <meta name="author" content="{{ blogInfo()->blog_name }}" />
    <link rel="canonical" href="{{ Request::root() }}" />
    <meta property="og:title" content="{{ blogInfo()->blog_name }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ blogInfo()->blog_description }}" />
    <meta property="og:url" content="{{ Request::root() }}" />
    <meta property="og:image" content="{{ blogInfo()->blog_logo }}" />
    <meta name="twitter:domain"     content="{{ Request::root() }}" />
    <meta name="twitter:card"     content="summary" />
    <meta name="twitter:title" property="og:title" itemprop="name" content="{{ Request::root() }}" />
    <meta name="twitter:description" property="og:description" itemprop="description"     content="{{ blogInfo()->blog_description }}" />
    <meta name="twitter:image"      content="{{ blogInfo()->blog_logo }}" />
    
    
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
                            <a href="{{ url('/') }}" class="text-white"><i class="bi bi-arrow-left fs-2"></i></a>
                        </div>
                       
                        <div class="col-12 ratefy-auth-tops bg-ratefy-secondary text-center py-3">
                            <a href="#" class="text-ratefy">
                                <img src="{{ \App\Models\Setting::find(1)->blog_logo }}"  height="35" alt="Tabler" class="navbar-brand-image logo">
                            </a>
                        </div>
                        @yield('content')
                        
                    </div>
                </div>
            </div>
           </div>
        </div>
    </main>
    
    <livewire:scripts />
    
    <script>
        function togglePassword() {
  var x = document.getElementById("passImput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
  </body>
</html>