@extends('layouts.master')

@section('content')
<style type="text/css">
    .infoTop{
        background-color: white;margin-left: 40px;margin-right: 40px; margin-bottom: 20px;
    }
    .infoTop img{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .infoTop .content1{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .infoTop span{
        font-size: 20px;
    }
</style>
<div class="row group-god last-song">
    <div class="col-sm-3  col-xs-12 shop-list-home-left"">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>


    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/movie/h1.jpg')}}" alt="">
        </div>
        
        <div class="dialogue-main-content">
            <div class="row">
                @foreach($last_song as $song)
                   <?php 
                        $datetime = new DateTime($song->date) ; 
                        $year = $datetime->format('Y');
                        $month = $datetime->format('m');
                        $day = $datetime->format('d');
                    ?>                        
                    <div class="infoTop" >

                            <img src="{{ asset('uploads/'.$song->image)}}" alt="">
                            @if($song->description !=null)
                            <div class="content1">
                                <span class="title-1">{{$year}}年{{$month}}月{{$day}}日</span>
                                <strong><h1>{{$song->title}}</h1></strong>
                                <span >{!! mb_substr($song->description ,0,100 )!!}...</span>
                            </div>
                            @endif
                        </div>
                  
                @endforeach
            </div>
            
        </div>

    </div>
   
</div>
@endsection