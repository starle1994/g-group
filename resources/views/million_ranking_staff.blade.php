@extends('layouts.master')

@section('content')
<div class="row group-rankking">
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row gr-rank-lineSli">
            <div class="col-xs-3" id="lineImg">
                @include('include.categories_left')
            </div>
            <div class="col-xs-9">

                <!-- dong 1 -->
                <div style="" class="slider1">
                    <div class="gr-rank-sliderAva">
                        <img src="{{asset('css/css/images/gigolo/img1.png')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($group_ranking as $group)
                       
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
                        <div class="col-xs-2 item">
                            <div class="title">
                               <img src="{{asset($image)}}" alt="">
                            </div>
                            
                            <div class="av-main">
                                <div class="avt-lf">
                                    <a href="{{route('staff-detail',$group->godstaffs->name)}}"><img class="avt-img"  src="{{asset('uploads/'.$group->godstaffs->image) }}" alt=""></a>
                                </div>
                            </div>

                            <div class="ft-bk">
                                    <a href="{{route('staff-detail',$group->godstaffs->name)}}"> {{$group->godstaffs->name}}</a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>


                <!-- dong 2 -->
                <div style="" class="slider1">
                    <div class="gr-rank-sliderAva">
                        <img src="{{ asset('css/css/images/gigolo/img1.png')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($million_god_staff as $group2)
                        
                        

                        <div class="col-md-2 col-xs-2 item">
                        
                        
                        <div class="av-main">
                            <div class="avt-lf">
                                <a href="{{route('staff-detail',$group2->name)}}"><img class="avt-img" src="{{ asset('uploads/'.$group2->image) }}" alt=""></a>
                            </div>
                        </div>

                        <div class="ft-bk">
                                V3達成!! 
                            </div>
                    </div>
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
     height1 = $('.group-rankking .gr-rank-slider2 .avt-left img').height();
    $('.group-rankking .gr-rank-slider2 .bk-left img').height(height1);
    width1 = $('.group-rankking .gr-rank-slider2 .avt-left img').width();
    $('.group-rankking .gr-rank-slider2 .bk-left img').width(width1);
    $('.gr-rank-containerSlider .right .avt-left').height(height1);
    height2 = $('.group-rankking .gr-rank-p2 .avt-lf img').height(); 
    $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').height(height2); 
    width2 = $('.group-rankking .gr-rank-p2 .avt-lf img').width(); 
    $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').width(width2); 
    height3 = $('.gr-rank-footer-p1 .item:first-child').height();
    $('.gr-rank-footer-p1 .item').height(height3);

    $( window ).resize(function() {
        height1 = $('.group-rankking .gr-rank-slider2 .avt-left img').height();
        $('.group-rankking .gr-rank-slider2 .bk-left img').height(height1);
        width1 = $('.group-rankking .gr-rank-slider2 .avt-left img').width();
        $('.group-rankking .gr-rank-slider2 .bk-left img').width(width1);
        $('.gr-rank-containerSlider .right .avt-left').height(height1);
        height2 = $('.group-rankking .gr-rank-p2 .avt-lf img').height(); 
        $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').height(height2); 
        width2 = $('.group-rankking .gr-rank-p2 .avt-lf img').width(); 
        $('.group-rankking .gr-rank-p2 .av-main .bg-lf img').width(width2); 
        $('.gr-rank-footer-p1 .item').height(height3);
    });

   
   
</script>
@endsection