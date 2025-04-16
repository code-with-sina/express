<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1977572736031091');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1977572736031091&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->

  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MKLB2LDL');
  </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ blogInfo()->blog_description }}">
  <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->blog_favicon }}" type="image/x-icon">
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
  <meta name="twitter:domain" content="{{ Request::root() }}" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" property="og:title" itemprop="name" content="{{ Request::root() }}" />
  <meta name="twitter:description" property="og:description" itemprop="description" content="{{ blogInfo()->blog_description }}" />
  <meta name="twitter:image" content="{{ blogInfo()->blog_logo }}" />


  @vite(['resources/js/app.js'])
  <livewire:styles />
</head>

<body class="bg-ratefy-primary p-0">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKLB2LDL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  @include('facebookpixel::body')
  <main class="d-flex vh-100">

    <div class="d-flex align-items-center text-white vw-100">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-4 px-4">
            <div class="row">
              <div class="col-12 py-3 px-0">
                <a href="{{ url('/') }}" class="text-white"><i class="bi bi-arrow-left fs-2"></i></a>
              </div>
              <!-- @if (url()->current() == route('users.register')) 
                          <div class="alert alert-info" role="alert">
                              The signup section is temporarily down.
                              <br>
                              <strong>However,<strong> you can reach us for your trade via whatsapp.
                              <br>
                              <a href="https://wa.link/kfwp9b" class="btn btn-success text-white w-100"><i class="bi bi-whatsapp"></i> Continue on whatsapp</a>
                          </div>
                        @endif -->
              <div class="col-12 ratefy-auth-tops bg-ratefy-secondary text-center py-3">
                <a href="#" class="text-ratefy">
                  <img src="{{ \App\Models\Setting::find(1)->blog_logo }}" height="35" alt="Tabler" class="navbar-brand-image logo">
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