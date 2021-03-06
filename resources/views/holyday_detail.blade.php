@extends('layouts.master')

@section('content')
    <div class="row group-god-item">
        <div class="col-sm-3 left">
            @include('include.categories_left')
        </div>

        <div class="col-sm-9 right">
            <div class="title">
                <img src="{{ asset('css/css/images/rookie-feature/ho.png') }}" alt="">
            </div>

            <div class="content">
                <div class="row top">

                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$holyday->image)}}" alt="{{$holyday->name}}">
                    </div>

                </div>

                <div class="dong-ke">
                </div>

                <!-- loop -->
                <div class="row main">
                    <div class="col-sm-12 ">
                        
                        @foreach($imagerestaurant as $item)
                           <div class="col-sm-6" style="margin-top: 5px">
                               <img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}" class="img-responsive">
                           </div>
                        @endforeach
                   
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection