<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Models\Setting::find(1)->blog_name }}</title>
  <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->blog_favicon }}" type="image/x-icon">
  <meta name="msvalidate.01" content="26BFA8E38450A2ECF17B14AF54E03291" />


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


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/front/css/styles.css">
  <script src="https://use.fontawesome.com/f6996e3010.js"></script>
  <livewire:styles />
  <!--<script src='//fw-cdn.com/2437764/3019256.js' chat='true'></script>-->
</head>

<body class="bg-dark text-white">
  <livewire:cover-page />



  <livewire:menu />
  <!--<div class="container fixed-bottom">-->
  <!--  <img src="/front/image/notification.png" class="img-fluid float-end mb-5" style="height: 45px;" alt="">-->
  <!--</div>-->
  <livewire:scripts />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>


  <script>
    window.__lc = window.__lc || {};
    window.__lc.license = 14933946;;
    (function(n, t, c) {
      function i(n) {
        return e._h ? e._h.apply(null, n) : e._q.push(n)
      }
      var e = {
        _q: [],
        _h: null,
        _v: "2.0",
        on: function() {
          i(["on", c.call(arguments)])
        },
        once: function() {
          i(["once", c.call(arguments)])
        },
        off: function() {
          i(["off", c.call(arguments)])
        },
        get: function() {
          if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
          return i(["get", c.call(arguments)])
        },
        call: function() {
          i(["call", c.call(arguments)])
        },
        init: function() {
          var n = t.createElement("script");
          n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
        }
      };
      !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
    }(window, document, [].slice))
  </script>
  <noscript><a href="https://www.livechat.com/chat-with/14933946/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>

  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
  </script>
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
  <!-- End Facebook Pixel Code -->



</body>

</html>