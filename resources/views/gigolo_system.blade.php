@extends('layouts.master')

@section('content')
<style>
    .system .contentSyst .textSyst .titText{
  padding-top: 30px;
  padding-bottom: 30px;
}

/* Google Map
=================================================================== */
#googlemaps-container-top {
    position: relative;
    z-index: 2;
    -webkit-box-shadow: inset 0px 3px 3px rgba(0,0,0,.25);
    -moz-box-shadow: inset 0px 3px 3px rgba(0,0,0,.25);
    box-shadow: inset 0px 3px 3px rgba(0,0,0,.25);
    height: 20px;
}

#googlemaps-container-bottom {
    position: relative;
    z-index: 2;
    -webkit-box-shadow: inset 0px -3px 3px rgba(0,0,0,.25);
    -moz-box-shadow: inset 0px -3px 3px rgba(0,0,0,.25);
    box-shadow: inset 0px -3px 3px rgba(0,0,0,.25);
    height: 20px;
    margin-top: -40px;
    border-bottom: 5px solid #f6f6f6;
    margin-bottom: 20px;
}

#googlemaps{
    position: relative;
    z-index: 1;
    height: 400px;
    width: 100%;
    top: -20px;
}

#small-map-container {
    -webkit-border-radius: 50em;
    -moz-border-radius: 50em;
    border-radius: 50em;
    position: relative;
    z-index: 2;
    border: 5px solid #f6f6f6;
    -webkit-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
    -moz-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
    box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
    height: 210px;
    width: 210px;
    margin-bottom: -215px;

}

#small-map-container a {
    -webkit-border-radius: 50em;
    -moz-border-radius: 50em;
    border-radius: 50em;
    position: relative;
    z-index: 2;
    height: 210px;
    width: 210px;
    display: block;
}
    
#small-map {
    position: relative;
    z-index: 1;
    -webkit-border-radius: 50em;
    -moz-border-radius: 50em;
    border-radius: 50em;
    margin-left: 5px;

}
.system .contentSyst .syscontent3 .ctImg3 img{
    min-height:auto;
    max-height: inherit;
}
</style> 
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
<div class="row system">
    <div class="bbq-list-item">
        <div class="col-sm-3  col-xs-12 shop-list-home-left"">
            <div class="exe-fa-line">
                 @include('include.categories_left2')
            </div>     
        </div>

    </div>
    <div class="col-sm-10 home-right">
        <img class="stTitl" src="{{asset('css/css/images/system/mainTitle.jpg')}}" alt="">
        <div class="contentSyst">
            <div class="textSyst">
                
                <div class="titText">
                    
                </div>
                <div class="syscontent4">
                    
                    {!! $system->million_god !!}
                </div>
                <div class="syscontent3">
                   
                    <div class="ctSys3">
                        <div class="flexImg3">
                            <div>Gigolo</div>
                            
                        </div>
                    </div>
                    <div class="ctImg3">
                        <div>
                            <img src="{{asset('css/css/images/system/ct3Top4.png')}}" alt="">
                        </div>
                        <div>
                            <img class="im1" src="{{asset('css/css/images/system/ct3Top5.png')}}" alt="">
                            <img class="im2" src="{{asset('css/css/images/system/ct3Top6.png')}}" alt="">
                        </div>
                    </div>
                 
                   
                </div>


            </div>
        </div>
        <div style="margin-top: 20px;">
        <input type="hidden" id="address" value="{{ $shopslist->address }}">
        <!-- starts: Google Maps -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <div id="googlemaps-container-top"></div>
        <div id="googlemaps" class="google-map google-map-full"></div>
        <div id="googlemaps-container-bottom"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKjiosnaD573LajklQ4M5NdDunTtG1su4&callback=myMap"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script type="text/javascript">
            var a = $('#address').val();
            $('#googlemaps').gMap({
                maptype: 'ROADMAP',
                scrollwheel: false,
                zoom: 13,
                markers: [
                    {
                        address: a, // Your Adress Here
                        html: '',
                        popup: false,
                    }

                ],

            });
           $(document).ready(function() {
                window.onload = function(){
                    var height = $('.system .contentSyst .syscontent3 .ctImg3 div:first-child').height();
                    $('.system .contentSyst .syscontent3 .ctImg3 div:first-child img').height(height);
                 };
                $(window).resize(function() {
                    var height = $('.system .contentSyst .syscontent3 .ctImg3 div:first-child').height();
                        $('.system .contentSyst .syscontent3 .ctImg3 div:first-child img').height(height);
                })
            }); 
        </script>
        <!-- end: Google Maps -->
    </div>
    </div>
</div>
@endsection