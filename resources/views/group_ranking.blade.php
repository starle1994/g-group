@extends('layouts.master')

@section('content')
<style type="text/css">
    a{
        color: white;
    }
</style>
<div class="row group-rankking">
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row gr-rank-lineSli">
            <div class="col-xs-3" id="lineImg">
                @include('include.categories_left')
            </div>
            <div class="col-xs-9 stt-rankking">
               <div class="slider1">
                    <div class="gr-rank-sliderAva" style="margin-bottom: 20px;">
                        <img src="{{ asset('css/css/images/group-rankking/g5.jpg') }}" alt="">
                    </div>
               </div>
               @if(isset($best_ranking[0]))
               <div class="gr-rank-slider2">
                    <div class=" row gr-rank-containerSlider">
                        <div class="col-md-6 col-sm-12 lf">
                            <div class="bk-left">
                               <a href="{{route('staff-detail',base64_encode($best_ranking[0]->godstaffs->id))}}"> <img src="{{ asset('css/css/images/group-rankking/bk2.png') }}" alt="">
                               </a>
                            </div>
                            
                            <div class="avt-left">
                               <a href="{{route('staff-detail',base64_encode($best_ranking[0]->godstaffs->id))}}"><img src="{{ asset('uploads/'.$best_ranking[0]->godstaffs->image) }}" alt="">
                               </a>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 right">
                            <div class="avt-left">
                                <ul>
                                    <li><img src="{{ asset('css/css/images/group-rankking/m1.png') }}" alt=""></li>
                                    <li class="txt">1樹</li>
                                    <li><img src="{{ asset('css/css/images/group-rankking/m1.png') }}" alt=""></li>
                                </ul>

                                <div class="txt-2">
                                   {{$best_ranking[0]->godstaffs->position}} <br>
                                    {{$best_ranking[0]->godstaffs->name}} 
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               @endif
                <div class="gr-rank-p2">
                   <div class="row contents">
                        @for( $i= 1 ;$i<=2; $i++)
                            @if(isset($best_ranking[$i]))
                            <div class="col-sm-6">
                                @if($best_ranking[$i]->ranking_id ==2)
                                    <?php $image = 'css/css/images/group-rankking/2st.jpg' ;
                                        $bk ='css/css/images/group-rankking/bk3.png';
                                    ?>
                                @elseif($best_ranking[$i]->ranking_id ==3)
                                    <?php $image = 'css/css/images/group-rankking/3st.jpg';
                                    $bk ='css/css/images/group-rankking/bk4.png'; ?>
                                @endif
                                <div class="title">
                                   <img src="{{asset($image)}}" alt="">
                                </div>
                                <div class="av-main">
                                    <div class="bg-lf">
                                        <a href="{{route('staff-detail',base64_encode($best_ranking[$i]->godstaffs->id))}}"><img src="{{asset($bk)}}" alt=""></a>
                                    </div>

                                    <div class="avt-lf">
                                        <a href="{{route('staff-detail',base64_encode($best_ranking[$i]->godstaffs->id))}}"><img src="{{ asset('uploads/'.$best_ranking[$i]->godstaffs->image) }}" alt=""></a>
                                    </div>
                                </div>

                                <div class="ft-bk">
                                    <a href="{{route('staff-detail',base64_encode($best_ranking[$i]->godstaffs->id))}}">{{$best_ranking[$i]->godstaffs->name}}</a>
                                </div>
                            </div>
                            @endif
                        @endfor
                   </div>
                </div>

                <div class="gr-rank-p2">
                   <div class="row contents">
                        @for( $i= 4 ;$i<=5; $i++)
                            @if(isset($best_ranking[$i]))
                            <div class="col-sm-6">
                                @if($group_ranking[$i]->ranking_id ==4)
                                    <?php $image = 'css/css/images/group-rankking/4st.jpg' ?>
                                @elseif($group_ranking[$i]->ranking_id ==5)
                                    <?php $image = 'css/css/images/group-rankking/5st.jpg' ?>
                                @endif
                                <div class="title">
                                   <img src="{{asset($image)}}" alt="">
                                </div>
                                
                                <div class="av-main">
                                    <div class="avt-lf">
                                        <img src="{{ asset('uploads/'.$group_ranking[$i]->godstaffs->image) }}" alt="">
                                    </div>
                                </div>

                                <div class="ft-bk">
                                    <a href="{{route('staff-detail',base64_encode($group_ranking[$i]->godstaffs->id))}}">{{$group_ranking[$i]->godstaffs->name}}</a>
                                </div>
                            </div>
                            @endif
                        @endfor
                   </div>
                </div>

                <!-- dong 1 -->
                <div style="margin-top: 30px" class="slider1">
                    <div class="gr-rank-sliderAva">
                        <img src="{{asset('css/css/images/group-rankking/H2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($group_ranking as $group)
                       @if($group->godstaff != null)
                        @if($group->ranking_id ==1)
                                    <?php $image = 'css/css/images/group-rankking/l1.jpg' ?>
                                @elseif($group->ranking_id ==2)
                                    <?php $image = 'css/css/images/group-rankking/l2.jpg' ?>
                                @elseif($group->ranking_id ==3)
                                    <?php $image = 'css/css/images/group-rankking/l3.jpg' ?>
                                @elseif($group->ranking_id ==4)
                                    <?php $image = 'css/css/images/group-rankking/l4.jpg' ?>
                                @elseif($group->ranking_id ==5)
                                    <?php $image = 'css/css/images/group-rankking/l5.jpg' ?>
                                @elseif($group->ranking_id ==6)
                                    <?php $image = 'css/css/images/group-rankking/l6.jpg' ?>
                                @elseif($group->ranking_id ==7)
                                    <?php $image = 'css/css/images/group-rankking/l7.jpg' ?>
                                @elseif($group->ranking_id ==8)
                                    <?php $image = 'css/css/images/group-rankking/l8.jpg' ?>
                                @elseif($group->ranking_id ==9)
                                    <?php $image = 'css/css/images/group-rankking/l9.jpg' ?>
                                @elseif($group->ranking_id ==10)
                                    <?php $image = 'css/css/images/group-rankking/l10.jpg' ?>
                        @endif
                        <div class="col-xs-2 item" style="margin-top: 30px">
                            <div class="title">
                               <img src="{{asset($image)}}" alt="">
                            </div>
                            
                            <div class="av-main">
                                <div class="avt-lf">
                                    <a href="{{route('staff-detail',base64_encode($group->godstaffs->id))}}"><img src="{{asset('uploads/'.$group->godstaffs->image) }}" alt=""></a>
                                </div>
                            </div>

                            <div class="ft-bk">
                                    <a href="{{route('staff-detail',base64_encode($group->godstaffs->id))}}"> {{$group->godstaffs->name}}</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    
                </div>


                <!-- dong 2 -->
                <div  class="slider1">
                    <div class="gr-rank-sliderAva" style="margin-top: 30px">
                        <img src="{{ asset('css/css/images/group-rankking/H3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($group_ranking_type2 as $group2)
                    @if($group2->godstaffs != null)
                        @if($group2->ranking_id ==1)
                                    <?php $image = 'css/css/images/group-rankking/l1.jpg' ?>
                                @elseif($group2->ranking_id ==2)
                                    <?php $image = 'css/css/images/group-rankking/l2.jpg' ?>
                                @elseif($group2->ranking_id ==3)
                                    <?php $image = 'css/css/images/group-rankking/l3.jpg' ?>
                                @elseif($group2->ranking_id ==4)
                                    <?php $image = 'css/css/images/group-rankking/l4.jpg' ?>
                                @elseif($group2->ranking_id ==5)
                                    <?php $image = 'css/css/images/group-rankking/l5.jpg' ?>
                                @elseif($group2->ranking_id ==6)
                                    <?php $image = 'css/css/images/group-rankking/l6.jpg' ?>
                                @elseif($group2->ranking_id ==7)
                                    <?php $image = 'css/css/images/group-rankking/l7.jpg' ?>
                                @elseif($group2->ranking_id ==8)
                                    <?php $image = 'css/css/images/group-rankking/l8.jpg' ?>
                                @elseif($group2->ranking_id ==9)
                                    <?php $image = 'css/css/images/group-rankking/l9.jpg' ?>
                                @elseif($group2->ranking_id ==10)
                                    <?php $image = 'css/css/images/group-rankking/l10.jpg' ?>
                        @endif
                        

                        <div class="col-xs-2 col-md-2 item" style="margin-top: 30px">
                        <div class="title">
                           <img src="{{ asset($image)}}" alt="">
                        </div>
                        
                        <div class="av-main">
                            <div class="avt-lf">
                               <a href="{{route('staff-detail',base64_encode($group2->godstaffs->id))}}">  <img src="{{ asset('uploads/'.$group2->godstaffs->image) }}" alt=""></a>
                            </div>
                        </div>

                        <div class="ft-bk">
                                <a href="{{route('staff-detail',base64_encode($group2->godstaffs->id))}}"> {{$group2->godstaffs->name}}</a>
                            </div>
                    </div>
                    @endif
                    @endforeach
                    
                    
                    
                </div>
            </div>
        </div>
    </div>


   <div class="col-sm-5 col-xs-12">
        @include('include.categories_right')
       
   </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
 var height = $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:first-child').height();
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:first-child img').height(height);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:last-child img').height(height);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .right div:first-child').height(height);

 var height2 = $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:first-child').height();
    $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:first-child img').height(height2);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:last-child img').height(height2); 

    var height4 = $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-footer-p1 .av-main div:first-child').height();
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-footer-p1 .av-main div:first-child img').height(height4);

     var height3 = $('.gr-rank-footer-p1 .item:first-child').height();
    $('.gr-rank-footer-p1 .item').height(height3);
    width2 = $('.group-rankking .gr-rank-p2 .avt-lf img').width(); 
    $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').width(width2); 

    $(window).resize(function() {
       var height = $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:first-child').height();

    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:first-child img').height(height);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .lf div:last-child img').height(height);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-containerSlider .right div:first-child').height(height);

    var height2 = $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:first-child').height();
    $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:first-child img').height(height2);
    $('.group-rankking .gr-rank-lineSli .stt-rankking .contents .av-main div:last-child img').height(height2); 

     var height4 = $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-footer-p1 .av-main div:first-child').height();
    $('.group-rankking .gr-rank-lineSli .stt-rankking .gr-rank-footer-p1 .av-main div:first-child img').height(height4);
     var height3 = $('.gr-rank-footer-p1 .item:first-child').height();
    $('.gr-rank-footer-p1 .item').height(height3);
    width2 = $('.group-rankking .gr-rank-p2 .avt-lf img').width(); 
    $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').width(width2); 
    });
});

</script>
@endsection