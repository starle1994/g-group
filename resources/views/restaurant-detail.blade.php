
@extends('layouts.master')

@section('content')
    <div class="row group-god-item">
        <div class="col-sm-3 left">
            @include('include.categories_left')
        </div>

        <div class="col-sm-9 right">
            <div class="title">
                <img src="{{ asset('css/css/images/rookie-feature/h1.png') }}" alt="">
            </div>

            <div class="content">
                <div class="row top">

                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$restaurant->image)}}" alt="{{$restaurant->name}}">
                    </div>

                </div>

                <div class="dong-ke">
                </div>

                <!-- loop -->
                <div class="row main">
                    <div class="col-sm-12 bao-avatar">
                        <div class="col-sm-7 avatar">
                            @foreach($imagerestaurant as $item)
                                <div class="row phan-tren">

                                    <div class="col-sm-6 a-top">
                                        <img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}">
                                    </div>

                                    <div class="col-sm-6 a-top">
                                        <img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}">
                                    </div>
                                </div>




                        </div>

                        <div class="col-sm-5 avatar">

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection