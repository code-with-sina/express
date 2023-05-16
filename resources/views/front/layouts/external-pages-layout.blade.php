<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ blogInfo()->blog_name }} | @yield('pagetitle')</title>
  <meta name="msvalidate.01" content="26BFA8E38450A2ECF17B14AF54E03291" />
 @yield('meta_tags')
  <!--<meta name="description" content="{{ blogInfo()->blog_description }}">-->
  <!--<meta name="author" content="{{ blogInfo()->blog_name }}">-->
  <link rel="shortcut icon" href="{{ blogInfo()->blog_favicon }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/front/css/styles.css">
  <script src="https://use.fontawesome.com/f6996e3010.js"></script>
  <livewire:styles />
  <!--<script src='//fw-cdn.com/2437764/3019256.js' chat='true'></script>-->
</head>
<body class="bg-dark text-white">
    @include('front.layouts.inc.header')

      <main class="container-fluid vh-75 mt-5">
        <div class="container pt-5">
            <div class="row">
              <div class="col col-md-10 mx-auto">
               
                <div class="container py-5 px-5">
                    
                    <div class="row">
                      
                          @yield('content')

                        </div>
                      </div>
                  </div>
                
            </div>
        </div>
      </main>
<livewire:blogmenu />
<livewire:scripts />

<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 14933946;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/14933946/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>