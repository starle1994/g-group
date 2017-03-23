@extends('layouts.gigolo_master')

@section('content')
 <div class="row">
                    <div class="col-sm-7 col-xs-12 home-left">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="ct-topLeft">
                                    <div><img class="imgex" src="{{ asset('css/css/images/rookie-feature/ex-title.png') }}"
                                     alt=""></div>
                                    <div class="infoTop">
                                        <img src="images/info1.png" alt="">
                                        <div class="content1">
                                            <span class="title-1">9月25日(土)</span>
                                            <span class="title-2"> 姿 幸音 オーナー BIRTHDAY PARTY </span>
                                        </div>
                                        <div class="line">
                                            <img src="images/line-title1.png" alt="">
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                    <div class="infoTop">
                                        <img src="images/info2.png" alt="">
                                        <div class="content1">
                                            <span class="title-1">3月14日(火)</span>
                                            <span class="title-2"> ホワイトデーイベント☆</span>
                                        </div>
                                        <div class="line">
                                            <img src="images/line-title1.png" alt="">
                                        </div>

                                    </div>
                                    <div class="clear-fix"></div>
                                    <div class="infoTop">
                                        <img src="images/info3.png" alt="">
                                        <div class="content1">
                                            <span class="title-1">3月23日(木) </span>
                                            <span class="title-2"> G`sカップ♪</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="ct-topLeft">
                                    <div><img class="imgex" src="{{ asset('css/css/images/rookie-feature/ex-title.png') }}"
                                     alt=""></div>
                                    <div class="infoTop">
                                        <img src="images/info3.png" alt="">
                                        <div class="content1">
                                            <span class="title-1 right">七瀬叶夢 幹部補佐×神子 幹部補佐×愛姫☆SPECIAL</span>
                                        </div>
                                        <div class="line">
                                            <img src="images/line-title1.png" alt="">
                                        </div>
                                    </div>
                                    <div class="infoTop">
                                        <img src="images/info4.png" alt="">
                                        <div class="content1">
                                            <span class="title-1">七瀬叶夢 幹部補佐×神子 幹部補佐×愛姫☆SPECIAL</span>
                                        </div>
                                        <div class="line">
                                            <img src="images/line-title1.png" alt="">
                                        </div>

                                    </div>
                                    <div class="infoTop">
                                        <img src="images/info5.png" alt="">
                                        <div class="content1">
                                            <span class="title-1">七瀬叶夢 幹部補佐×神子 幹部補佐×愛姫☆SPECIAL</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="avaId">
                            <div class="col-xs-12 pd0">
                                <div class="titleAva">
                                    CLGT
                                </div>
                            </div>
                            <div class="col-xs-4 pdLeft">
                                <div class="ct-ava">
                                    <img src="images/avatar1.png" alt="">
                                    <p class="titleAva">
                                        asdfsdfasdf
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-4 pdCenter">
                                <div class="ct-ava">
                                    <img src="images/avatar2.png" alt="">
                                    <p class="titleAva">
                                        asdfsdfasdf
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-4 pdRight">
                                <div class="ct-ava">
                                    <img src="images/avatar3.png" alt="">
                                    <p class="titleAva">
                                        asdfsdfasdf
                                    </p>
                                </div>
                            </div>
                            <div class="clear-fix"></div>
                               <div class="col-xs-4 pdLeft">
                                    <div class="ct-ava">
                                        <img src="images/avatar4.png" alt="">
                                        <p class="titleAva">
                                            asdfsdfasdf
                                        </p>
                                    </div>
                                </div>
                            <div class="col-xs-4 pdCenter">
                                <div class="ct-ava">
                                    <img src="images/avatar5.png" alt="">
                                    <p class="titleAva">
                                        asdfsdfasdf
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-4 pdRight" >
                                        <div class="ct-ava">
                                            <img src="images/avatar6.png" alt="">
                                            <p class="titleAva">
                                                asdfsdfasdf
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="row lineSli">
                            <div class="col-xs-3" id="lineImg">
                                @include('include.categories_left2')
                            </div>
                            <div class="col-xs-9">
                               <div class="slider1">
                                    <div class="sliderAva">
                                        <p class="titleAva"></p>
                                    </div>
                                    <div class="containerSlider">
                                        <div class="owl-carousel owl-theme">
                                            @foreach($secrect_contents as $secrect_content)
                                                <div class="item"><img class="setHeight" src="{{ asset('uploads/'.$secrect_content->image) }}" alt="{{$secrect_content->name}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                               </div>
                               <div class="slider2">
                                    <div class="sliderAva">
                                        <p class="titleAva">abc</p>
                                    </div>
                                    <div class="containerSlider">
                                        <div class="owl-carousel owl-theme">
                                            @foreach($rookies_feature as $rookie)
                                                <div class="item"><img class="setHeight" src="{{ asset('uploads/'.$rookie->image) }}" alt="{{$rookie->name}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                               </div>

                               <div class="number">
                                   <div class="sliderAva">
                                        <p class="titleAva">abc</p>
                                    </div>
                                    <div class="bannerContent">
                                        <div class="row rowPlus">
                                            @foreach($gigoloPageContents as $item)
                                                <div class="col-xs-6 bcLeft">
                                                    <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                                                </div>                                                                                   
                                            @endforeach
                                        </div>        
                                    </div>
                               </div>
                               <div class="gold">
                                   <div class="gold">
                                       @foreach($shop_list as $list)
                                            <div class="contentGold">
                                                <img src="{{ asset('uploads/'.$list->image) }}" alt="">
                                            </div>
                                        @endforeach 
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>

                   <div class="col-sm-5 col-xs-12">
                       <div class="title-Right">
                           
                       </div>
                       @foreach($gigoloRankingStaff as $item)
                            <div class="tableTop">
                               <img src="{{ asset('uploads/'.$item->banner) }}" alt="">
                               <div class="tableCt">
                                   <p></p>
                               </div>
                           </div>
                        @endforeach                          
                   </div>
                </div>
@endsection