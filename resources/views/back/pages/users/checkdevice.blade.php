<!DOCTYPE html>
<html lang="en">
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
    @vite(['resources/js/app.js', 'resources/js/client-express-chat.js', 'resources/js/client-chat-notification.js'])
    <livewire:styles />
</head>
<body class="bg-ratefy-primary w-100" style="overflow-x:hidden;" onload="checkDevice()">
    
    <main class="container-fluid text-white mx-0 my-0 py-5 px-0">
        
        <p class="text-center py-5 my-5 mx-auto">Setting you up...</p>
        
    </main>
    <livewire:scripts />
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('back/admin-js/countdown.js')}}"></script> 
    
    
    
    <script>
        function checkDevice (){
            let width = parseInt(window.visualViewport.width);
            let height = window.visualViewport.height;
            if(width < 600) {
                window.location.href = `new-chat-mobile?message={{ $sessionid }}`;
            }else {
                window.location.href = `new-chat-home?message={{ $sessionid }}`;
            }
        }
        $(document).ready(function () {
            checkDevice();
        });
    </script>
    
           
    

</body>
</html>





