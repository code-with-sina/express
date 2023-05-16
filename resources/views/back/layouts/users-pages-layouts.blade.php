<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pagetitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('ratefy/style.css')}}">
    
    <meta name="description" content="{{ blogInfo()->blog_description }}">
    <meta name="author" content="{{ blogInfo()->blog_name }}">
    @yield('meta_tags')

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
  <body class="bg-ratefy-primary overflow-y-hidden h-100 p-0 m-0">
    @include('back.layouts.users-inc.header')

    <main class="container-fluid row text-white p-0  m-0  h-100">
          @include('back.layouts.users-inc.left-sidebar')
          <div class="col-lg-8 col-md-12 col-sm-12 col-12 px-sm-3 px-3 px-md-5 py-3 pt-5 over-tin h-100 vh-100" >
            @yield('content')
          </div>
          @include('back.layouts.users-inc.right-sidebar')
    </main>
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <livewire:scripts />
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/644660b631ebfa0fe7fa0d64/1gupejic9';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
<script>
    let businessProfileLogo =   document.getElementById("businessProfileLogo");
  
    let check = document.getElementById("business-logo");
    check.addEventListener("change", function(){
 
      if(check.files.length == 0 ){
            console.log("no files selected");
        }else{
             businessProfileLogo.src = URL.createObjectURL(check.files[0]);
            console.log(check.files[0]);
        }  
    });
    
  </script>
  </body>
</html>