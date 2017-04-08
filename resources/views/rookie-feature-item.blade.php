@extends('layouts.master')

@section('content')
<div class="row bbq-list-item">
        <div class="col-sm-3 left">
          @include('include.categories_left2')
        </div>

        <div class="col-sm-9 right">
            <div class="title">
                <img src="{{ asset('css/css/images/rookie-feature/h1.png') }}" alt="">
            </div>
            
            <div class="content">
                <div class="row top">
                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$rookie_feature->image) }}" alt="" >
                    </div>

                    <div class="col-sm-6 paraph">
                        {!! $rookie_feature->description !!}
                    </div>
                </div>

                <div class="dong-ke">
                    
                </div>
                
                <!-- loop -->
                <div class="row for-loop" style="padding-right: 40px;padding-left: 40px">
                {!! $rookie_feature->content !!}
            </div>
        </div>
    </div>
</div>


   
@endsection