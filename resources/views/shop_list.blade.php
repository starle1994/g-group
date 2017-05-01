 @extends('layouts.master')

@section('content')
     <div class="col-sm-3 col-xs-12 shop-list-home-left">
        <div class="exe-fa-line">\
                    @include('include.categories_left2')
        </div>

    </div>
    <div class="col-sm-9 content">
        <div class="shop-list-title">
            <img style="width: 100%" src="{{ asset('css/css/images/shop-list/ショップリスト.jpg') }}" alt="">
        </div>

        <div class="row shop-list-content-item">
        <!-- start loop -->
            <div class="shop-list-item">
                <div class="row">
                    <div class="col-sm-6">
                        {!! $shop_list[0]->description !!}
                    </div>
                    <div class="col-sm-6 relation-image">
                         <img class="parent" src="{{ asset('uploads/'.$shop_list[0]->image_intro) }}" alt="">
                        <img class="chil" src="{{ asset('css/css/images/shop-list/GOD copy.png') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 item-button">
                        <a href="{{route('million-god')}}"><img src="{{ asset('css/css/images/shop-list/バナー(GOD).jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="shop-list-line">
                    <img src="{{ asset('css/css/images/shop-list/o_sen3.jpg') }}" alt="">
                </div>
            </div>

            <div class="shop-list-item">
                <div class="row">
                    <div class="col-sm-6">
                         {!! $shop_list[1]->description !!}
                    </div>

                    <div class="col-sm-6 relation-image ">
                        <img class="parent" src="{{ asset('uploads/'.$shop_list[1]->image_intro) }}" alt="">
                                    <img class="chil" src="{{ asset('css/css/images/shop-list/ジゴロロゴpng24.png') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 item-button">
                        <a href="{{route('gigoro')}}"><img src="{{asset('css/css/images/shop-list/gigolo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="shop-list-line">
                    <img src="{{ asset('css/css/images/shop-list/o_sen3.jpg') }}" alt="">
                </div>
            </div>
        <!-- end loop -->

            <div class="clear-KH">
                
            </div>
        </div>
    </div>
                
@endsection