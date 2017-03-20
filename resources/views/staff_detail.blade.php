@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-7 home-left">
        <div class="col-xs-3 rkImgLeft">
                <img src="images/groupRankkingItem/rkLine1.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine2.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine3.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine4.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine5.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine6.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine7.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine8.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine9.jpg" alt="">
                <img src="images/groupRankkingItem/rkLine10.jpg" alt="">
           </div>
        @if($staff != null)
        <div class="col-xs-9">
            <div class="photoTop">
                <div class="flexPt">
                    <div class="photoLeft">
                        <img class="mainPhoto" src="images/groupRankkingItem/photo.png" alt="">
                        <img class="bgPhoto" src="../images/groupRankkingItem/bgPhoto.png" alt="">
                    </div>
                    <div class="textPhoto">
                        <p>{{$staff->possition}}</p>
                        <span>{{$staff->romajiname}}</span>
                        <p>{{$staff->name}}</p>
                    </div>
                </div>
                {!!$staff->description!!}
            </div>
            <div class="sliderPt">
                <img class="imgPhoto" src="images/groupRankkingItem/imgPhoto.png" alt="">
                <div class="containerSlider">
                    <div class="owl-carousel owlRankking owl-theme">
                        <div class="item"><img class="" src="images/groupRankkingItem/sli3.png" alt=""></div>
                        <div class="item"><img class="" src="images/groupRankkingItem/sli2.png" alt=""></div>
                        <div class="item"><img class="" src="images/groupRankkingItem/sli1.png" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="sliderPt">
                <img class="imgPhoto" src="images/groupRankkingItem/move.png" alt="">
                <div class="containerSlider">
                    <div class="owl-carousel owlRankking owl-theme">
                        <div class="item"><a href=""><img class="" src="images/groupRankkingItem/video1.png" alt=""></a></div>
                    </div>
                </div>
            </div>



            <div class="rkBot">
                <p>ABBB BB BBBB</p>
                <span>2017年02月度 Million GOD　売上No.1</span>
                <span>2017年０1月度 Million GOD　売上No.2</span>

                <span>2016年12月度 Million GOD　売上No.3</span>
            </div>
        </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-5 home-left imgRight">
        <img src="images/groupRankkingItem/r1.jpg" alt="">
        <img src="images/groupRankkingItem/r2.jpg" alt="">
        <img src="images/groupRankkingItem/r3.jpg" alt="">
        <img src="images/groupRankkingItem/r4.jpg" alt="">
        <img src="images/groupRankkingItem/r5.jpg" alt="">
        <img src="images/groupRankkingItem/r6.jpg" alt="">
        <img src="images/groupRankkingItem/r7.jpg" alt="">
        <img src="images/groupRankkingItem/r8.jpg" alt="">
        <img src="images/groupRankkingItem/r9.jpg" alt="">
        <img src="images/groupRankkingItem/r10.jpg" alt="">
        <img src="images/groupRankkingItem/r11.jpg" alt="">
        <img src="images/groupRankkingItem/r12.jpg" alt="">



    </div>
</div>
@endsection