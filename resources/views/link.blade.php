@extends('layouts.master')

@section('content')
<div class="row event-restaurant">
    <div class="col-sm-3  col-xs-12 shop-list-home-left"">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>

   <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/event-restaurant/リンク.jpg')}}" alt="">
        </div>
        
        <div class="content">
            <!-- loop -->
            @foreach($links as $link)
            <div class="row event-loop">
                <div class="row top"> 
                    <div class="col-sm-12 even-text text-left">
                        <span class="lg">{{$link->name_english}}</span> <span class="small">{{$link->name_japanese}}</span>
                    </div>
                </div>

                <div class="backs-1" style="height: auto">
                    <a href="{{route($link->alias)}}"><img src="{{ asset('uploads/'.$link->image)}}" alt="" ></a>
                </div>
            </div>

            <div class="dong-ke">
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection