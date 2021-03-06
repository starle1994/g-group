@extends('layouts.master')

@section('content')
<style type="text/css">
    @media (max-width: 768px)
    {
        .home-left, .title-Right {
            margin-top: 0px;
    }
      
    @media screen and (min-width: 320px)
    {
        .group-rankking-top #main #mainContetn .container-fluid {
            padding-left: 0px;
            padding-top: 0px;
        }
    }

}
</style>
 <div class="row home">
    <!--                    all content left   -->
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row sm-hidden">
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino.png') }}"
                     alt=""></div>
                    <div class="scroll">
                    @if(isset($blogs1[0]) && strcmp ( $blogs1[0]->name , 'メンテナンス中') == 0)
                        <div class="col-sm-12 under">
                            <img src="{{ asset('uploads/'.$blogs1[0]->image) }}" alt="" class="img-responsive">
                        </div>
                    @else
                         @foreach($blogs1 as $blog)
                     
                            <?php
                                $datetime = new DateTime($blog->created_at) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                                $time = $datetime->format('h:m');
                            ?>
                            
                                <div class="infoTop">
                                    <a href="{{route('blog-detail',$blog->alias)}}"><img src="{{ asset('uploads/'.$blog->image_1) }}" alt=""></a>
                                    <div class="content1">
                                        <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                       <a href="{{route('blog-detail',$blog->alias)}}"> <span class="title-2"> {{$blog->name}}</span></a>
                                    </div>
                                    <div class="line">
                                        <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                    </div>
                                    
                                </div>
                            
                        @endforeach         
                    @endif
                                  
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino2.png')}}"
                     alt=""></div>

                    <div class="scroll">
                    @if(isset($blogs[0]) && strcmp ( $blogs[0]->name , 'メンテナンス中') == 0)
                        <div class="col-sm-12 under">
                            <img src="{{ asset('uploads/'.$blogs[0]->image) }}" alt="" class="img-responsive">
                        </div> 
                    @else
                        @foreach($blogs as $blog)
                            <?php
                                $datetime = new DateTime($blog->created_at) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                                $time = $datetime->format('h:m');
                            ?>
                          
                            <div class="infoTop">
                                <a href="{{route('blog-detail',$blog->alias)}}"><img src="{{ asset('uploads/'.$blog->image_1) }}" alt=""></a>
                                <div class="content1">
                                    <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                    <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                </div>
                                <div class="line">
                                    <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                </div>
                            </div>
                        @endforeach
                    @endif                          
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('css/css/images/grouptop/titleMino3.png')}}"
                     alt=""></div>

                    <div class="scroll">
                    @if(isset($blogs2[0]) && strcmp ( $blogs2[0]->name , 'メンテナンス中') == 0)
                        <div class="col-sm-12 under">
                            <img src="{{ asset('uploads/'.$blogs2[0]->image) }}" alt="" class="img-responsive">
                        </div>
                                
                       
                    @else
                        @foreach($blogs2 as $blog)
                            <?php
                                $datetime = new DateTime($blog->created_at) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                                $time = $datetime->format('h:m');
                            ?>
                                <div class="infoTop">
                                    <a href="{{route('blog-detail',$blog->alias)}}"><img src="{{ asset('uploads/'.$blog->image_1) }}" alt=""></a>
                                    <div class="content1">
                                        <span class="title-1 right">{{$year}}年{{$month}}月{{$day}}日</span>
                                        <a href="{{route('blog-detail',$blog->alias)}}"><span class="title-2"> {{$blog->name}}</span></a>
                                    </div>
                                    <div class="line">
                                        <img src="{{ asset('css/css/images/line-title1.png')}}" alt="">
                                    </div>
                                </div>
                        @endforeach  
                    @endif
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
                <div class="col-xs-4 <?php if($million->ranking->number ==1) echo 'pdLeft' ;if($million->ranking->number ==2) echo 'pdCenter'; if($million->ranking->number ==3) echo 'pdRight'?> ">
                    <div class="ct-ava">
                        <a href="{{ ($million->godstaffs != null) ? route('staff-detail',base64_encode($million->godstaffs->id)) : ''}}"><img src="{{ asset('uploads/'.$million->image) }}" alt="{{$million->name}}"></a>
                        @if($million->ranking->number ==1)
                        <p class="titleAva1" >
                            
                        </p>
                        @endif
                        @if($million->ranking->number ==2)
                        <p class="titleAva2">
                            
                        </p>
                        @endif
                        @if($million->ranking->number ==3)
                        <p class="titleAva3">
                            
                        </p>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="clear-fix"></div>
            <div class="col-xs-12 pd0">
                <div class="titleAva2">
                    
                </div>
            </div>

            @foreach($gigolo_ranking_staff as $gigolo)
                <div class="col-xs-4 <?php if($gigolo->ranking->number ==1) echo 'pdLeft' ;if($gigolo->ranking->number ==2) echo 'pdCenter'; if($gigolo->ranking->number ==3) echo 'pdRight'?> ">
                    <div class="ct-ava">
                        <a href="{{ ($gigolo->godstaffs != null) ? route('staff-detail',base64_encode($gigolo->godstaffs->id)) : ''}}"><img src="{{ asset('uploads/'.$gigolo->image) }}" alt="{{$gigolo->name}}"></a>
                        @if($gigolo->ranking->number ==1)
                        <p class="titleAva1">
                            
                        </p>
                        @endif
                        @if($gigolo->ranking->number ==2)
                        <p class="titleAva2">
                            
                        </p>
                        @endif
                        @if($gigolo->ranking->number ==3)
                        <p class="titleAva3">
                            
                        </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row lineSli">
            <div class="col-md-3 sm-hidden" id="lineImg">
                <img src="{{ asset('css/css/images/group-rankking/Line@.jpg')}}" alt="">
                @include('include.categories_left')
            </div>
            <div class="col-md-9 col-md-12 no-padding ">
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
                            <div class="item">
                                 <a href="{{route('rookie-feature-detail',$rookie->alias)}}"><img class="setHeight" src="{{ asset('uploads/'.$rookie->image) }}" alt="{{$rookie->name}}">
                                 </a>
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