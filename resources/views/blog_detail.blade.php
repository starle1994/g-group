@extends('layouts.master')

@section('content')
<div class="row group-god">
    <div class="col-sm-3 left">
        
        @include('include.categories_left2')
        
    </div>

    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/blog-list/ブログ素材.jpg')}}" alt="">
        </div>
        
        <div class="content">
                                <!-- back -->
            <a href="{{route('Blog')}}"><h2 class="back">◁戻る</h2></a>

            <div class="row title-first">
                <div class="col-sm-6">
                    {{$blog->shopslist->name}}
                </div>

                <div class="col-sm-6">
                    2017年3月8日　13:09（水）
                </div>
            </div>

            <div class="row header text-center">
                <h2>{{$blog->name}}</h2>
            </div>

            <div class="row blog-content">
                {!! $blog->content !!}
            </div>
        </div>

    </div>
   
</div>
@endsection