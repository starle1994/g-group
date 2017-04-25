@extends('layouts.master')

@section('content')
<style type="text/css">
    .group-god .right .content .blog-content img{
        width: 70%;
        height: auto;
    }
    @media (max-width: 768px)
{
    .group-god .right .content .blog-content span{
        font-size: 13px !important;
    }
    .group-god .right .content .blog-content p{
        font-size: 13px !important;
    }
}
</style>
<div class="row group-god">
    <div class="col-sm-3  col-xs-12 shop-list-home-left"">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>

    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/blog-list/ブログ素材.jpg')}}" alt="">
        </div>
        
        <div class="content">
                                <!-- back -->
            <a href="{{route('Blog')}}"><p class="back name-blog">◁戻る</p></a>

            <div class="row title-first">
                <div class="col-sm-6 text-center">
                    {{$blog->shopslist->name}}
                </div>

                <div class="col-sm-6 text-center">
                <?php 
                    $datetime = new DateTime($blog->created_at) ; 
                    $year = $datetime->format('Y');
                    $month = $datetime->format('m');
                    $day = $datetime->format('d');
                    $time = $datetime->format('h:m');
                ?>
                    {{$year}}年{{$month}}月{{$day}}日　{{$time}}（水）
                </div>
            </div>

            <div class="row header text-center">
                <p class="name-blog">{{$blog->name}}</p>
            </div>

            <div class="row blog-content text-center">
                {!! $blog->content !!}
            </div>
        </div>
    </div>
</div>
@endsection