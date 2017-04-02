@extends('layouts.master')

@section('content')
<div class="row milion-god">             
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row">
            <div class="col-sm-6">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/milion-god/t1.jpg')}}"
                     alt=""></div>

                    <div class="scroll">
                    <?php $first = true?>
                        @foreach($blogs1 as $blog)
                            <?php
                                $datetime = new DateTime($blog->created_at) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                                $time = $datetime->format('h:m');
                            ?>
                            @if($first==true)
                                <?php $first = false?>
                                <div class="infoTop">                                           
                                    <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                    <div class="content1">
                                        <span class="title-1">{{$year}}年{{$month}}月{{$day}}日</span>
                                        <span class="title-2"> {{$blog->name}}</span>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                            @else
                                <?php $first = false?>
                                <div class="infoTop">
                                    <div class="line">
                                        <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                    </div>
                                    <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                    <div class="content1">
                                        <span class="title-1">{{$year}}年{{$month}}月{{$day}}日</span>
                                        <span class="title-2"> {{$blog->name}}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach                                            
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/milion-god/t2.jpg')}}"
                     alt=""></div>

                    <div class="scroll">
                    <?php $first = true?>
                        @foreach($blogs as $blog)
                            <?php
                                $datetime = new DateTime($blog->created_at) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                                $time = $datetime->format('h:m');
                            ?>
                            @if($first==true)
                                <?php $first = false?>
                                <div class="infoTop">                                           
                                    <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                    <div class="content1">
                                        <span class="title-1">{{$year}}年{{$month}}月{{$day}}日</span>
                                        <span class="title-2"> {{$blog->name}}</span>
                                    </div>
                                </div>
                            @else
                                <?php $first = false?>
                                <div class="infoTop">
                                    <div class="line">
                                        <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                    </div>
                                    <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                    <div class="content1">
                                        <span class="title-1">{{$year}}年{{$month}}月{{$day}}日</span>
                                        <span class="title-2"> {{$blog->name}}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach                                            
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
                        <div class="row rowPlus" style="margin-left:0px">
                        @foreach($godPageContent as $item)
                            <div class="col-xs-6 bcLeft">
                                <a href="{{route($item->alias)}}"><img src="{{ asset('uploads/'.$item->image) }}" alt=""></a>
                            </div>                                          
                            
                        @endforeach
                        </div>                                                                              
                    </div>
               </div>
               <div class="gold">
                   @foreach($shop_list as $list)
                   <div class="contentGold">
                       <a href="{{route($list->alias)}}"><img src="{{ asset('uploads/'.$list->image) }}" alt=""></a>
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