@extends('layouts.master')

@section('content')
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
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-sm-6 avatar">
                    <a href="{{route('blog-detail',$blog->alias)}}">
                        <img src="{{ asset('uploads/'.$blog->image)}}" alt="{{$blog->name}}">
                    </a>
                </div>
                @endforeach
                
            </div>
            
            
            

        </div>

    </div>
   
</div>
@endsection