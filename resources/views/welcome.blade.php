 @extends('layouts.master')

@section('content')
 <div class="row">
    <!--                    all content left   -->
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row">
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino.png') }}"
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
                            <div class="infoTop">
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                   <a href="{{route('blog-detail',$blog->alias)}}"> <span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                                
                            </div>
                        @else
                            <?php $first = false?>
                            <div class="infoTop">
                                
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                            </div>
                        @endif
                    @endforeach                        
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino2.png')}}"
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
                            <div class="infoTop">
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                            </div>
                        @else
                            <?php $first = false?>
                            <div class="infoTop">
                                
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                            </div>
                        @endif
                    @endforeach                          
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino3.png')}}"
                     alt=""></div>

                    <div class="scroll">
                    <?php $first = true?>
                    @foreach($blogs2 as $blog)
                        <?php
                            $datetime = new DateTime($blog->created_at) ; 
                            $year = $datetime->format('Y');
                            $month = $datetime->format('m');
                            $day = $datetime->format('d');
                            $time = $datetime->format('h:m');
                        ?>
                        @if($first==true)
                            <div class="infoTop">
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                            </div>
                        @else
                            <?php $first = false?>
                            <div class="infoTop">
                                
                                <img src="{{ asset('uploads/'.$blog->image) }}" alt="">
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <span class="title-2"> {{$blog->name}}</span>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
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
            @foreach($million_ranking_staff as $million)
                <div class="col-xs-4 pdLeft">
                    <div class="ct-ava">
                        <img src="{{ asset('uploads/'.$million->image) }}" alt="{{$million->name}}">
                        <p class="titleAva1">
                            
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="clear-fix"></div>
            <div class="col-xs-12 pd0">
                <div class="titleAva2">
                    
                </div>
            </div>
            @foreach($gigolo_ranking_staff as $gigolo)
                <div class="col-xs-4 pdLeft">
                    <div class="ct-ava">
                        <img src="{{ asset('uploads/'.$gigolo->image) }}" alt="{{$gigolo->name}}">
                        <p class="titleAva1">
                            
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row lineSli">
            <div class="col-xs-3" id="lineImg">
                <img src="{{ asset('css/css/images/group-rankking/Line@.jpg')}}" alt="">
                @include('include.categories_left')
            </div>
            <div class="col-xs-9">
               <div class="slider1">
                    <div class="sliderAva">
                        <p class="titleAva4"></p>
                    </div>
                    <div class="containerSlider">
                        <div class="owl-carousel owl-theme">
                            
                            @foreach($secrect_contents as $secrect_content)
                            <div class="item"><a href="{{route($secrect_content->alias)}}"><img class="setHeight" src="{{ asset('uploads/'.$secrect_content->image) }}" alt="{{$secrect_content->name}}"></a></div>
          
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
                            <div class="item"><img class="setHeight" src="{{ asset('uploads/'.$rookie->image) }}" alt="{{$rookie->name}}"></div>
          
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
                            @foreach($contents as $content)
                            <div class="col-xs-6 bcLeft">
                               <a href="{{route($content->alias)}}"> <img src="{{ asset('uploads/'.$content->image) }}" alt="{{$content->name}}"></a>
<!--    
                                <div class="bnContent">
                                    <span>Number - Staff</span>
                                    <span>asfsadf</span>
                                    <p>asdf <br> afasdf</p>
                                </div>
-->
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
        @include('include.categories_right')
   </div>
</div>
@endsection