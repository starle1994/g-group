@extends('layouts.master')

@section('content')
<div class="row rkItem">
    <div class="col-xs-12 col-sm-7 home-left">
        <div class="col-xs-3 rkImgLeft">
            @include('include.categories_left')
        </div>
        @if($staff != null)
        <div class="col-xs-9">
            <div class="photoTop">
                <div class="flexPt">
                    <div class="photoLeft">
                        <img class="mainPhoto" src="{{ asset('uploads/'.$staff->image)}}" alt="">
                        <img class="bgPhoto" src="{{ asset('css/css//images/groupRankkingItem/bgPhoto.png') }}" alt="">
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
                <img class="imgPhoto" src="{{ asset('css/css/images/groupRankkingItem/imgPhoto.png')}}" alt="">
                <div class="containerSlider">
                    <div class="owl-carousel owlRankking owl-theme">

                        @if($staff->staffphotos->isEmpty() != true)
                            @foreach($staff->staffphotos as $photo)
                                <div class="item"><img class="" src="{{ asset('uploads/'.$photo->image)}}" alt=""></div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="sliderPt">
                <img class="imgPhoto" src="{{ asset('css/css/images/groupRankkingItem/move.png')}}" alt="">
                <div class="containerSlider">
                    <div class="owl-carousel owlRankking owl-theme">
                        @if($staff->staffmovies->isEmpty() != true)
                            @foreach($staff->staffmovies as $movie)
                                <div class="item"><img class="" src="{{ asset('uploads/'.$movie->image)}}" alt=""></div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>



            <div class="rkBot">
                <p>過去の実績</p>
                @foreach($logs as $log)
                    <span>{{$log->year}}年{{$log->month}}月{{$staff->shopslist->name}}No.3</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-5 home-left imgRight">
        @include('include.categories_right')
    </div>
</div>
@endsection