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
    max-height: auto;
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
                <div class="sysContent1">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 ctImg">
                            <img src="{{asset('css/css/images/system/imgContent1.png')}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 ctText">
                            {!! $system->cost !!}
                        </div>
                    </div>
                </div>
                <div class="titText2">
                    
                </div>
                <div class="sysContent2">
                     {!! $system->before_visiting  !!}
                    <span class="spec">来店時に、以下のいずれかのご本人様確認書類をお持ち下さい。</span>
                    <div class="bgContent">
                       <span>・運転免許証</span>
                       <span>・パスポート</span>
                       <span>・住民基本台帳カード</span>
                       <span>・身体障害者手帳</span>
                       <span>・外国人登録証明書</span>
                    </div>
                </div>


                <div class="titText3">
                    
                </div>
                <div class="syscontent3">
                    <p>G’s GROUPは「Million GOD」「Gigolo」の全2店舗を現在展開しております。</p>
                    <p>全店舗それぞれオリジナルのスタイルで運営しておりますので、</p>
                    <div class="ctSys3">
                        <div class="flexImg3">
                            <div>Million GOD</div>
                            <div>
                                <a href="{{route('milliongod-system')}}"><span class="mi-gi"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="ctImg3">
                        <div>
                            <img src="{{asset('css/css/images/system/ct3Top1.png')}}" alt="">
                        </div>
                        <div>
                            <img class="im1" src="{{asset('css/css/images/system/ct3Top2.png')}}" alt="">
                            <img class="im2" src="{{asset('css/css/images/system/ct3Top3.png')}}" alt="">
                        </div>
                    </div>

                    <div class="ctSys3">
                        <div class="flexImg3">
                            <div>Gigolo</div>
                            <div>
                                <a href="{{route('gigilo-system')}}"><span class="sp2" ></span></a>
                            </div>
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


                <div class="titText4">
                    
                </div>
                <div class="syscontent4">
                    <p>お会計は全て、伝票でお出ししております。</p>
                    <p>お支払には、各種クレジットカードのご利用も可能です。</p>
                    <p>ご不明な点が御座いましたらお問い合わせください。</p>
                    <div class="card">
                        <p class="pCard">◆ご利用可能なクレジットカード◆</p>
                        <div class="flexCard">
                            <a href=""><img src="{{asset('css/css/images/system/icon1Visa.png')}}" alt=""></a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon2.png')}}" alt="">
                            </a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon3.png')}}" alt="">
                            </a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon4.png')}}" alt="">
                            </a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon5.png')}}" alt="">
                            </a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon6.png')}}" alt="">
                            </a>
                            <a href="">
                            <img src="{{asset('css/css/images/system/icon7.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="titText5">
                    
                </div>
                <div class="syscontent5">
                    
                    {!! $system->greeting !!}
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;">
        <input type="hidden" id="address" value="{{$system->address}}">
        <!-- starts: Google Maps -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <div id="googlemaps-container-top"></div>
        <div id="googlemaps" class="google-map google-map-full"></div>
        <div id="googlemaps-container-bottom"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKjiosnaD573LajklQ4M5NdDunTtG1su4
&callback=myMap"></script>
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
        </script>
        <!-- end: Google Maps -->
    </div>
    </div>
</div>
@endsection