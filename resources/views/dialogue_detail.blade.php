@extends('layouts.master')

@section('content')

    <div class="row dialogue-item">
        <div class="col-sm-3  col-xs-12 shop-list-home-left"">
            <div class="exe-fa-line">
                 @include('include.categories_left2')
            </div>     
        </div>
       
        <div class="col-sm-9 right">
            <div class="exe-fa-head-1">
                <img src="{{ asset('css/css/images/rookie-feature/h1.png') }}" alt="">
            </div>

            <div class="content">
                <div class="row top">
                    <div class="exe-fa-head-1">
                        <img src="{{ asset('uploads/'.$dialog->image)}}" alt="">
                    </div>

                    <div class="col-sm-6 paraph">
                        <div class="parap">
                            {!!$dialog->description!!}

                        </div>
                    </div>
                </div>

                <div class="dong-ke"></div>

                <div class="row">

                    <div class="embed-responsive embed-responsive-16by9" class="modal-body" id="yt-player">
                        <iframe  src="{{$dialog->link}}" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="col-sm-12 footer-head">
                       <!-- <img src="images/dialogue-item/footer.png" alt="">-->
                        <img src="{{ asset('css/css/images/dialogue-item/footer.png') }}" alt="">
                        <p>{!! $dialog->name !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection