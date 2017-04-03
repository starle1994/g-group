@extends('layouts.master')

@section('content')
<div class="row exe-fa">
    <div class="col-sm-3  col-xs-12 shop-list-home-left"">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>


    <div class="col-sm-9">
        <div class="exe-fa-head-1">
            <img src="{{ asset('css/css/images/rookie-feature/h1.png')}}" alt="">
        </div>
        
        <div class="exe-main-content">
            <div class="row">
                @foreach($rookie_feature as $rookie_feature)
                    <div class="col-xs-6 exe-fa-content">
                        <a href="{{route('rookie-feature-detail',$rookie_feature->alias)}}">
                            <img src="{{ asset('uploads/'.$rookie_feature->image)}}" alt="{{$rookie_feature->name}}">
                        </a>
                    </div>
                @endforeach
            </div>

            
        </div>
        
    </div>
   
</div>
@endsection