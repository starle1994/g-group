<!DOCTYPE HTML>
<html lang="vi">
   <head>
    <meta charset="UTF-8">
    <title>Gs-Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="Abstract" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="content-language" content="">
    <link href='{!! url('css/css/bootstrap.min.css') !!}' rel='stylesheet' type='text/css' />
    <link href='{!! url('css/css/bootstrap-responsive.css') !!}' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='{!! url('css/css/owl.carousel.min.css') !!}' rel='stylesheet' type='text/css' />
     <link href='{!! url('css/css/style.css') !!}' rel='stylesheet' type='text/css' />
     <script src='{!! url('js/jquery-3.1.1.min.js') !!}' type='text/javascript'></script>
    <script src='{!! url('js/bootstrap.min.js') !!}' type='text/javascript'></script>
    <script src='{!! url('js/owl.carousel.min.js') !!}' type='text/javascript'></script>
    <style type="text/css">
        #preloader{position:fixed; top:0; left:0; right:0; bottom:0; background-color:#fff; z-index:99}
#status{width:200px; height:200px; position:absolute; left:50%; top:50%; background-image:url("status.gif"); background-repeat:no-repeat; background-position:center; margin:-100px 0 0 -100px}

    </style> 
    </head>
<body id="calendar_div">
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

    <div id="wrapper" class="groupTop shop_list group-rankking-top">
        @include('layouts.header')
        <div id="main">
            <img class="bgCheo" src="{{ asset('css/css/images/grouptop/bgCheo.jpg')}}" alt="">
            <div id="mainContetn">
                <div class="container-fluid">
                    @yield('content')
                </div>
            <footer>
                    @include('layouts.footer')
            </footer>
            </div>

        </div>
    </div>
   
</body>
<script type="text/javascript">
        $('#mainMenu a:nth-child(7)').after("<br>");
        $('#menu').click(function(){
            $('#mainMenu').toggle();
        });
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            
            1000:{
                items:2
            }
        }
    });
    $(window).on('load', function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(100).css({
        'overflow': 'visible'
    });
})    
</script>
</html>
