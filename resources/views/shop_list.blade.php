 @extends('layouts.master')

@section('content')
     <div class="col-sm-2 col-xs-12 shop-list-home-left">
        @include('include.categories_left2')
    </div>

                <div class="col-sm-10">
                    <div class="shop-list-title">
                        <img style="width: 100%" src="{{ asset('css/css/images/shop-list/ショップリスト.jpg') }}" alt="">
                    </div>

                    <div class="row shop-list-content-item">
                        <!-- loop -->
                        <!-- item -->
                        <div class="shop-list-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! $shop_list[0]->description !!}
                                </div>
                                <div class="col-sm-6 right">
                                    <img class="parent" src="{{ asset('uploads/'.$shop_list[0]->image_intro) }}" alt="">
                                    <img class="chil" src="{{ asset('css/css/images/shop-list/GOD copy.png') }}" alt="">
                                </div>
                            </div>

                            <div style="margin-top: 20px" class="row">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 ft">
                                    <img src="{{ asset('css/css/images/shop-list/バナー(GOD).jpg') }}" alt="">
                                </div>
                            </div>

                            <div class="shop-list-line">
                                <img src="{{ asset('css/css/images/shop-list/o_sen3.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- item -->
                        <div class="shop-list-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! $shop_list[1]->description !!}
                                    
                                </div>

                                <div class="col-sm-6 right">
                                    <img class="parent" src="{{ asset('uploads/'.$shop_list[1]->image_intro) }}" alt="">
                                    <img class="chil" src="{{ asset('css/css/images/shop-list/ジゴロロゴpng24.png') }}" alt="">
                                </div>
                            </div>

                            <div style="margin-top: 20px" class="row">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 ft">
                                    <img src="{{asset('images/shop-list/バナー(GOD).jpg')}}" alt="">
                                </div>
                            </div>

                            <div class="shop-list-line">
                                <img src="{{ asset('css/css/images/shop-list/o_sen3.jpg') }}" alt="">
                            </div>
                        </div>
                        <!-- end item -->
                        
                        <div class="col-xs-12 replace">
                        </div>
                    </div>
                    <!-- phan trang -->
                    
                </div>
@endsection