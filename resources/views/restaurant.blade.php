@extends('layouts.master')

@section('content')
    <div class="row group-god">
        <div class="col-sm-3 left">

            @include('include.categories_left')

        </div>

        <div class="col-sm-9 right">
            <div class="title">
                <img src="{{ asset('css/css/images/rookie-feature/res.jpg') }}" alt="">
            </div>

            <div class="content">

                <div class="row">
                    @foreach($restaurants as $item)

                        <div class="col-sm-6 avatar">

                            <a href="{{route('restaurant-detail',$item->alias)}}"><img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}"></a>
                        </div>
                    @endforeach
                </div>




            </div>

        </div>

    </div>
@endsection