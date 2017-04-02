@extends('layouts.master')

@section('content')
<style type="text/css">
    .td-video-play-ico > img {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1;
    width: 40px !important;
}
</style>
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
                                <div class="item"><img class="" src="{{ asset('uploads/'.$photo->photo)}}" alt=""></div>
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
                            @foreach($staff->staffmovies as $item)
                                <?php                 
                                    if ($item->image == null) {
                                        $embedCode = '<iframe src="'.$item->link.'" frameborder="0" allowfullscreen></iframe>';
                                        preg_match('/src="([^"]+)"/', $embedCode, $match);

                                        // Extract video url from embed code
                                        $videoURL = $match[1];
                                        $urlArr = explode("/",$videoURL);
                                        $urlArrNum = count($urlArr);

                                        // YouTube video ID
                                        $youtubeVideoId = $urlArr[$urlArrNum - 1];

                                        // Generate youtube thumbnail url
                                        $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
                                    }else{
                                        $thumbURL = asset('uploads/'.$item->image);
                                    }                  
                                    $target = 'myModal-'.$item->id ; 
                                    $target_1= '#'.$target ;
                                ?>  
                                <div class="item" data-toggle="modal" data-target="{{$target_1}}">
                                    <img class="" src="{!! $thumbURL !!}" alt="">
                                    <span class="td-video-play-ico">
                                        <img class="td-retina" src="{!! asset('css/css/images/ico-video-large.png') !!}" alt="video">
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="rkBot">
                <p>過去の実績</p>
                @foreach($logs as $log)
                    @if($log->type == 1)
                        <span>{{$log->year}}年{{$log->month}}グループ売上ランキングNo.{{$log->ranking->number}}</span>
                    @else 
                        @if($log->type == 2)
                            <span>{{$log->year}}年{{$log->month}}月グループ指名本数ランキングNo.{{$log->ranking->number}}</span>
                        @else
                            <span>{{$log->year}}年{{$log->month}}月{{$staff->shopslist->name}}No.{{$log->ranking->number}}</span>
                        @endif
                    @endif
                    
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-5 home-left imgRight">
        @include('include.categories_right')
    </div>
</div>
@if($staff->staffmovies->isEmpty() != true)
            @foreach($staff->staffmovies as $item)
                <?php 
                    $target = 'myModal-'.$item->id ; 
                ?>                 
    <div id="{{$target}}" class="modal fade" data-backdrop="static"  >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">{{$item->id}}</h4>
            </div>
            <div class="embed-responsive embed-responsive-16by9" class="modal-body" >
              <iframe  src="{{$item->link}}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
  </div> 
  @endforeach
@endif

@endsection