 @extends('layouts.master')

@section('content')
 <div class="row">
    <!--                    all content left   -->
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row">
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('images/grouptop/titleMino.png') }}"
                     alt=""></div>
                    <div class="scroll">
                        <div class="infoTop">
                            <img src="images/info1.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月4日(土) </span>
                                <span class="title-2">MI-YA MG BDE☆</span>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        <div class="infoTop">
                           <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>

                            <img src="images/info2.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月14日(火)</span>
                                <span class="title-2"> ホワイトデーイベント☆</span>
                            </div>

                        </div>
                        <div class="clear-fix"></div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info3.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木)  </span>
                                <span class="title-2"> G’sカップ♪</span>
                            </div>
                        </div>

                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info3.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木)  </span>
                                <span class="title-2"> G’sカップ♪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('images/grouptop/titleMino2.png')}}"
                     alt=""></div>

                    <div class="scroll">
                        <div class="infoTop">
                            <img src="images/info3.png" alt="">
                            <div class="content1">
                                <span class="title-1 right">11月29日(土) </span>
                                <span class="title-2"> 空城リュウ×奏  スペシャルグラビア☆</span>
                            </div>
                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info4.png" alt="">
                            <div class="content1">
                                <span class="title-1">1月29日(土)</span>
                                <span class="title-2"> 夜神 優姫矢× レナ☆SPECIAL ☆</span>
                            </div>

                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info5.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月14日(火)</span>
                                <span class="title-2">ホワイトデーイベント☆  のコピー 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ct-topLeft">
                    <div><img class="imgex" src="{{ asset('images/grouptop/titleMino3.png')}}"
                     alt=""></div>

                    <div class="scroll">
                        <div class="infoTop">
                            <img src="images/info3.png" alt="">
                            <div class="content1">
                                <span class="title-1 right">9月25日</span>
                                <span class="title-2">(土) 幸音 オーナー BDP ☆</span>
                            </div>
                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info4.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木) </span>
                                <span class="title-2">G’sカップ♪  のコピー</span>
                            </div>
                        </div>
                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info5.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木) </span>
                                <span class="title-2">G’sカップ♪  のコピー</span>
                            </div>
                        </div>

                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info5.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木) </span>
                                <span class="title-2">G’sカップ♪  のコピー</span>
                            </div>
                        </div>

                        <div class="infoTop">
                            <div class="line">
                                <img src="images/line-title1.png" alt="">
                            </div>
                            <img src="images/info5.png" alt="">
                            <div class="content1">
                                <span class="title-1">3月23日(木) </span>
                                <span class="title-2">G’sカップ♪  のコピー</span>
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
                <img src="images/group-rankking/Line@.jpg" alt="">
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
                            <div class="item"><img class="setHeight" src="{{ asset('uploads/'.$secrect_content->image) }}" alt="{{$secrect_content->name}}"></div>
          
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
                                <img src="{{ asset('uploads/'.$content->image) }}" alt="{{$content->name}}">
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
                   <div class="contentGold">
                       <img src="images/gold1.jpg" alt="">
                   </div>
                   <div class="contentGold">
                       <img src="images/gig.jpg" alt="">
                   </div>
                   <div class="contentGold">
                       <img src="images/gold1.jpg" alt="">
                   </div>
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