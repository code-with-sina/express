
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="description" content="{{ blogInfo()->blog_description }}">
    <meta name="author" content="{{ blogInfo()->blog_name }}">
    @yield('meta_tags')
    <title>@yield('pagetitle')</title>
    <!-- CSS files -->
    <base href="/">
    <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->blog_favicon }}" type="image/x-icon">
    <link href="./back/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('back/dist/libs/ijabo/ijabo.min.css')}}">
    <link rel="stylesheet" href="{{ asset('back/dist/libs/ijaboCropTool/ijaboCropTool.min.css')}}">
    <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/jquery-ui-1.13.2/jquery-ui.min.css" />
    <link rel="stylesheet" href="/jquery-ui-1.13.2/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="/jquery-ui-1.13.2/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css" />
    <link rel="stylesheet" href="./back/admin-css/style.css" />
    
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
    

    @stack('stylesheets')
    {{-- @vite(['resources/js/app.js']) --}}
    <link href="./back/dist/css/demo.min.css" rel="stylesheet"/>
    <style>
      .swal2-popup{
        font-size: .85rem;
      }
    </style>
     @livewireStyles
  </head>
  <body>
    <div class="wrapper">
      @include('back.layouts.inc.header')
      <div class="page-wrapper my-5">
        <div class="container-xl">
          <!-- Page title -->
          @yield('pageHeader')
        </div>
        <div class="page-body">
          <div class="container-xl">
            @yield('content')
          </div>
        </div>
        @include('back.layouts.inc.footer')
      </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/ijabo/ijabo.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/ijaboCropTool/ijaboCropTool.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <!-- Tabler Core -->
    <script src="/back/dist/js/tabler.min.js"></script>
    @stack('scripts')
    @livewireScripts
    <script>
      $('input[name="post_tags"]').amsifySuggestags();
      window.addEventListener('showToastr', function(event){
        toastr.remove();
        if(event.detail.type === 'info'){
            toastr.info(event.detail.message);
        }else if(event.detail.type === 'success'){
            toastr.success(event.detail.message);
        }else if(event.detail.type === 'error'){
          toastr.success(event.detail.message);
        }else if(event.detail.type === 'warning'){
          toastr.success(event.detail.message);
        }else{
          return false;
        } 
      });
    </script>
    <script src="./back/dist/js/demo.min.js"></script>
    <script type="text/javascript">
      var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');
  
      if (notificationsCount <= 0) {
      notificationsWrapper.hide();
      }
  
      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;
  
      var pusher = new Pusher('API_KEY_HERE', {
      encrypted: true
      });
  
      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('user-transaction');
  
      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\TransactionNotificationEvent', function(data) {
      var existingNotifications = notifications.html();
      var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
      var newNotificationHtml = `
        <li class="notification active">
          <div class="media">
          <div class="media-left">
            <div class="media-object">
            <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
            </div>
          </div>
          <div class="media-body">
            <strong class="notification-title">`+data.message+`</strong>
            <!--p class="notification-desc">Extra description can go here</p-->
            <div class="notification-meta">
            <small class="timestamp">about a minute ago</small>
            </div>
          </div>
          </div>
        </li>
      `;
      notifications.html(newNotificationHtml + existingNotifications);
  
      notificationsCount += 1;
      notificationsCountElem.attr('data-count', notificationsCount);
      notificationsWrapper.find('.notif-count').text(notificationsCount);
      notificationsWrapper.show();
      });
    </script>
  </body>
</html>