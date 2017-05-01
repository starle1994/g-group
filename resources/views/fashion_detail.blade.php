@extends('layouts.master')

@section('content')
    <div class="row gigolo-list-item group-god">
        <div class="col-sm-3 col-xs-12 left">
            @include('include.categories_left')
        </div>

        <div class="col-sm-9 right" style="margin-top: 10px">
            <div class="title">
                <img src="{{ asset('css/css/images/rookie-feature/fas.png') }}" alt="">
            </div>

            <div class="content">
                <div class="row top">

                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$fashion->image)}}" alt="{{$fashion->name}}">
                    </div>
                    <div class="col-sm-6 paraph">
                    <?php 
                        $datetime = new DateTime($fashion->created_at) ; 
                        $year = $datetime->format('Y');
                        $month = $datetime->format('m');
                        $day = $datetime->format('d');
                        $time = $datetime->format('h:m');
                     ?>
                        <p>
                            <span class="time">                            {{$year}}年{{$month}}月{{$day}}日</span> <br>
                            <span class="year">{{$fashion->name}}</span> <br>
                            {!! $fashion->description !!}
                        </p>
                    </div>
                </div>

                <div class="dong-ke">
                </div>

               
                <div class="row main">
                    <div class="main-follow">
                    @foreach($imagerestaurant as $item)
                        <div class="col-sm-12 loop">
                            <div class="col-sm-6 avatar">
                                <img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}">
                            </div>

                            <div class="col-sm-6 paraph">
                                <h2 class="question">{!! $item->name !!}</h2>
                                <p class="answer">{!! $item->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection