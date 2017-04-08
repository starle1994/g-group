@extends('layouts.master')

@section('content')
<div class="row bbq-list-item">
    <div class="col-sm-3 left">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>


    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/tomo-list/h1.jpg')}}" alt="">
        </div>
        
        <div class="content">
            <div class="row top">
                <div class="col-sm-6 avt-parent">
                    <img src="{{ asset('uploads/'.$officeWorkFreature->image) }}" alt="">
                </div>
                 <div class="col-sm-6 paraph">
                        {!! $officeWorkFreature->description !!}
                    </div>
            </div>
            
                           <div class="dong-ke">
                    
                </div>
            
            <!-- start loop -->
            <div class="row for-loop" style="padding-right: 40px;padding-left: 40px">
                {!! $officeWorkFreature->content !!}
            </div>
            <!-- end loop -->

        </div>

    </div>
   
</div>
@endsection