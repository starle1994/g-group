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
                                <img src="{{ asset('css/css/images/dialogue/h1.jpg') }}" alt="">
                            </div>

                            <div class="dialogue-main-content">
                            
                                <div class="parap">
                                    <p><?php echo $dialog_topic->description; ?></p>

                                </div>
                                @foreach($dialogs as $item)
                                    <div class="row">
                                        <div class="col-xs-12 dialogue-content">
                                            <a href="{{route('dialogue-detail',$item->alias)}}">
                                                <img src="{{asset('uploads/'.$item->image)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                        </div>

                    </div>
                </div>
@endsection