@extends('layouts.master')

@section('content')
<div class="row cash-feature-item">
    <div class="col-sm-3 left">
        @include('include.categories_left2')
    </div>

    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/rookie-feature/h1.png') }}" alt="">
        </div>
        
        <div class="content">
            <div class="row">
                <div class="col-sm-6 avatar">
                    <img src="{{ asset('uploads/'.$rookie_feature->image) }}" alt="">
                </div>
            </div>
            
            <div class="line">
                
            </div>

            <div class="nen">
                    
            </div>
            
            <!-- start loop -->
            <div class="row for-loop" style="padding-right: 20px;padding-left: 20px">
                {!! $rookie_feature->description !!}
            </div>
            <!-- end loop -->

           

        </div>

    </div>
   
</div>
@endsection