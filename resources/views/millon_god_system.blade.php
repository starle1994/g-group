@extends('layouts.master')

@section('content')
<style>
    .system .contentSyst .textSyst .titText{
  padding-top: 30px;
  padding-bottom: 30px;
}
</style>
<div class="row system">
    <div class="bbq-list-item">
                            <div class="col-sm-3 left">
                                 @include('include.categories_left2')
                            </div>
                        </div>
    <div class="col-sm-10 home-right">
        <img class="stTitl" src="{{asset('css/css/images/system/mainTitle.jpg')}}" alt="">
        <div class="contentSyst">
            <div class="textSyst">
                <div class="titText">
                    
                </div>
                <div class="syscontent4">
                    
                    {!! $system->million_god !!}
                </div>
                
                <div class="syscontent3">
                    
                    <div class="ctSys3">
                        <div class="flexImg3">
                            <div>Million GOD</div>
                        </div>
                    </div>
                    <div class="ctImg3">
                        <div>
                            <img src="{{asset('css/css/images/system/ct3Top1.png')}}" alt="">
                        </div>
                        <div>
                            <img class="im1" src="{{asset('css/css/images/system/ct3Top2.png')}}" alt="">
                            <img class="im2" src="{{asset('css/css/images/system/ct3Top3.png')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
@endsection