<html lang="vi">
   <head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="Abstract" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="content-language" content="">
    <link href='{!! url('css/css/bootstrap.min.css') !!}' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='{!! url('css/css/owl.carousel.min.css') !!}' rel='stylesheet' type='text/css' />
     <link href='{!! url('css/css/style.css') !!}' rel='stylesheet' type='text/css' />
      <script src='{!! url('js/jquery-3.1.1.min.js') !!}' type='text/javascript'></script>
    <script src='{!! url('js/bootstrap.min.js') !!}' type='text/javascript'></script>
    <script src='{!! url('js/owl.carousel.min.js') !!}' type='text/javascript'></script>
    </head>
<body id="calendar_div">
    <div id="wrapper" class="groupTop">
        @include('layouts.header')
        <div id="main">
            <img class="bgCheo" src="{{ asset('images/grouptop/bgCheo.jpg')}}" alt="">
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
    })
</script>
</html>
