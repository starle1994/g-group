@extends('layouts.master')

@section('content')
<div class="row exe-fa">
    <div class="col-sm-3">
        <div class="exe-fa-line">
            @include('include.categories_left2')
        </div>
        
    </div>

    <div class="col-sm-9">
        <div class="exe-fa-head-1">
            <img src="{{ asset('css/css/images/tomo-list/h1.jpg')}}" alt="">
        </div>
        <div class="exe-main-content">
            <div class="row">
                @foreach($officeWorkFreature as $officeWorkFreature)
                    <div class="col-xs-6 exe-fa-content">
                        <a href="{{route('office-work-feature-detail',$officeWorkFreature->alias)}}">
                            <img src="{{ asset('uploads/'.$officeWorkFreature->image)}}" alt="{{$officeWorkFreature->name}}">
                        </a>
                    </div>
                @endforeach
            </div>

            
        </div>
        
    </div>
   
</div>
@endsection