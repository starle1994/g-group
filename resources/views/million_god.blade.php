@extends('layouts.master')

@section('content')
<div class="row milion-god">
                    
    <div class="col-sm-7 col-xs-12 home-left">

        <div class="row">
            <div class="col-sm-6">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino.png')}}"
                     alt=""></div>

                    <div class="scroll">
                        <div class="infoTop">
                            <img src="{{ asset('css/css/images/milion-god/sm1.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月4日(土) </span>
                                <span class="title-2">MI-YA MG BDE☆</span>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        <div class="infoTop">
                           <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>

                            <img src="{{ asset('css/css/images/info2.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月14日(火)</span>
                                <span class="title-2"> ホワイトデーイベント☆</span>
                            </div>

                        </div>
                        <div class="clear-fix"></div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>
                            <img src="{{ asset('css/css/images/info3.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木)  </span>
                                <span class="title-2"> G’sカップ♪</span>
                            </div>
                        </div>

                        <div class="infoTop">
                            <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>
                            <img src="{{ asset('css/css/images/info3.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木)  </span>
                                <span class="title-2"> G’sカップ♪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino2.png')}}"
                     alt=""></div>
                    <div class="scroll">
                        <div class="infoTop">
                            <img src="{{ asset('css/css/images/info3.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1 right">11月29日(土) </span>
                                <span class="title-2"> 空城リュウ×奏  スペシャルグラビア☆</span>
                            </div>
                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>
                            <img src="{{ asset('css/css/images/info4.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">1月29日(土)</span>
                                <span class="title-2"> 夜神 優姫矢× レナ☆SPECIAL ☆</span>
                            </div>

                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>
                            <img src="{{ asset('css/css/images/info5.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月14日(火)</span>
                                <span class="title-2">ホワイトデーイベント☆  のコピー 2</span>
                            </div>
                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                            </div>
                            <img src="{{ asset('css/css/images/info5.png')}}" alt="">
                            <div class="content1">
                                <span class="title-1">3月14日(火)</span>
                                <span class="title-2">ホワイトデーイベント☆  のコピー 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="avaId">
            <div class="col-xs-12 pd0">
                <div class="titleAva1">
                    
                </div>
            </div>
            <div class="col-xs-4 pdLeft">
                <div class="ct-ava">
                    <?php $route0 = $recoments[0]->alias ?>
                    <a href="{{route($route0)}}"><img src="{{ asset('uploads/'.$recoments[0]->image) }}" alt=""></a>
                    <p class="titleAva1">
                        
                    </p>
                </div>
            </div>
            <div class="col-xs-4 pdCenter">
                <div class="ct-ava">
                    <?php $route1 = $recoments[1]->alias ?>
                    <a href="{{route($route1)}}"><img src="{{ asset('uploads/'.$recoments[1]->image) }}" alt=""></a>
                    <p style="height: 45px;" class="titleAva2">
                        
                    </p>
                </div>
            </div>
            <div class="col-xs-4 pdRight">
                <div class="ct-ava">
                    <?php $route2 = $recoments[2]->alias ?>
                    <a href="{{route($route2)}}"><img src="{{ asset('uploads/'.$recoments[2]->image) }}" alt=""></a>
                    <p style="height: 45px;" class="titleAva3">
                        
                    </p>
                </div>
            </div>
            <div class="clear-fix"></div>
            <div class="col-xs-12 pd0">
                <!-- <div class="titleAva2">
                    
                </div> -->
            </div>
            <div class="col-xs-4 pdLeft">
                    <div class="ct-ava">
                        <?php $route3 = $recoments[3]->alias ?>
                    <a href="{{route($route3)}}"><img src="{{ asset('uploads/'.$recoments[3]->image) }}" alt=""></a>
                        <p class="titleAva1">
                            
                        </p>
                    </div>
                </div>
            <div class="col-xs-4 pdCenter">
                <div class="ct-ava">
                    <?php $route4 = $recoments[4]->alias ?>
                    <a href="{{route($route4)}}"><img src="{{ asset('uploads/'.$recoments[4]->image) }}" alt=""></a>
                    <p style="height: 45px;" class="titleAva2">
                        
                    </p>
                </div>
            </div>
            <div class="col-xs-4 pdRight" >
                <div class="ct-ava">
                    <?php $route5 = $recoments[5]->alias ?>
                    <a href="{{route($route5)}}"><img src="{{ asset('uploads/'.$recoments[5]->image) }}" alt=""></a>
                    <p style="height: 45px;" class="titleAva3">
                        
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
                        <p class="titleAva4"></p>
                    </div>
                    <div class="containerSlider">
                        <div class="owl-carousel owl-theme">
                            @foreach($secrect_contents as $secrect_content)
                                <?php $route = $secrect_content->alias ?>
                                <div class="item"><a href="{{route($route)}}"><img class="setHeight" src="{{ asset('uploads/'.$secrect_content->image) }}" alt="{{$secrect_content->name}}"><a href="{{route($route1)}}"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
               </div>
               <div class="slider2">
                    <div class="sliderAva">
                        <p class="titleAva5"></p>
                    </div>
                    <div class="containerSlider">
                        <div class="owl-carousel owl-theme">
                            @foreach($rookies_feature as $rookie)
                                <?php $alias = $rookie->alias ?>
                                <div class="item"><a href="{{route('rookie-feature-detail',$alias)}}"><img class="setHeight" src="{{ asset('uploads/'.$rookie->image) }}" alt="{{$rookie->name}}"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
               </div>

               <div class="number">
                   <div class="sliderAva">
                        <p class="titleAva6"></p>
                    </div>
                    <div class="bannerContent">
                        <div class="row rowPlus">
                        @foreach($godPageContent as $item)
                            <div class="col-xs-6 bcLeft">
                                <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                            </div>                                          
                            
                        @endforeach
                        </div>                                                                              
                    </div>
               </div>
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
<!--                        all content right-->
   <div class="col-sm-5 col-xs-12 home-right">
    <div class="logo" style="margin-bottom: 30px;">
        <img src="{{ asset('css/css/images/milion-god/logo.jpg') }}" alt="">
    </div>
    @foreach($millionGodRankingStaff as $item)
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