@extends('layouts.million_god_master')

@section('content')
<style type="text/css">
    a{
        color: #fff;
    }
</style>
<div class="row group-rankking million">
    <div class="col-sm-7 col-xs-12 home-left">
        <div class="row gr-rank-lineSli">
            <div class="col-xs-3" id="lineImg">
                @include('include.categories_left')
            </div>
            <div class="col-sm-9 col-xs-12">

                <!-- dong 1 -->
                <div style="" class="slider1">
                    <div class="gr-rank-sliderAva" style="margin-bottom: 20px;">
                        <img src="{{asset('css/css/images/gigolo/img1.png')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($group_ranking as $group)
                        @if($group->godstaffs !=null)
                            @if($group->ranking_id ==1)
                                        <?php $image = 'css/css/images/million-god-staff/l1.png';
                                            $bk ='css/css/images/group-rankking/bk2.png'; ?>
                                    @elseif($group->ranking_id ==2)
                                        <?php $image = 'css/css/images/million-god-staff/l2.png' ;
                                        $bk ='css/css/images/group-rankking/bk3.png';?>
                                    @elseif($group->ranking_id ==3)
                                        <?php $image = 'css/css/images/million-god-staff/l3.png' ;
                                        $bk ='css/css/images/group-rankking/bk4.png';?>
                                    @elseif($group->ranking_id ==4)
                                        <?php $image = 'css/css/images/million-god-staff/l4.png' ?>
                                    @elseif($group->ranking_id ==5)
                                        <?php $image = 'css/css/images/million-god-staff/l5.png' ?>
                                    @elseif($group->ranking_id ==6)
                                        <?php $image = 'css/css/images/million-god-staff/l6.png' ?>
                                    @elseif($group->ranking_id ==7)
                                        <?php $image = 'css/css/images/million-god-staff/l7.png' ?>
                                    @elseif($group->ranking_id ==8)
                                        <?php $image = 'css/css/images/million-god-staff/l8.png' ?>
                                    @elseif($group->ranking_id ==9)
                                        <?php $image = 'css/css/images/million-god-staff/l9.png' ?>
                                    @elseif($group->ranking_id ==10)
                                        <?php $image = 'css/css/images/million-god-staff/l10.png' ?>
                            @endif
                            <div class="col-xs-2 item" style="margin-bottom: 20px;">
                                <div class="title">
                                   <img src="{{asset($image)}}" alt="">
                                </div>
                                
                                <div class="av-main">
                                    @if($group->ranking_id == 1 || $group->ranking_id==2 ||$group->ranking_id==3)
                                    <div class="bg-lf" style="position: absolute;">
                                        <a href="{{route('staff-detail',base64_encode($group->godstaffs->id))}}"><img src="{{asset($bk)}}" alt=""></a>
                                    </div>
                                    @endif
                                    <div class="avt-lf">
                                        <a href="{{route('staff-detail',base64_encode($group->godstaffs->id))}}"><img class="avt-img"  src="{{asset('uploads/'.$group->godstaffs->image) }}" alt=""></a>
                                    </div>
                                </div>

                                <div class="ft-bk">
                                    {{$group->godstaffs->position}}<br> 
                                    <a href="{{route('staff-detail',base64_encode($group->godstaffs->id))}}"> {{$group->godstaffs->name}}</a><br>
                                    {{$group->godstaffs->comment}} 
                                </div>
                            </div>
                         @endif
                    @endforeach
                    
                </div>
                <!-- dong 2 -->
                <div style="margin-bottom: 20px;" class="slider1">
                    <div class="gr-rank-sliderAva" >
                        <img src="{{ asset('css/css/images/gigolo/img2.png')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($million_god_staff as $group2)
                        @if($group2->position ==null)
                        <div class="col-md-2 col-xs-2 item" style="margin-bottom: 15px;">
                            <div class="av-main">
                                <div class="avt-lf">
                                    <a href="{{route('staff-detail',base64_encode($group2->id))}}"><img class="avt-img" src="{{ asset('uploads/'.$group2->image) }}" alt=""></a>
                                </div>
                            </div>

                            <div class="ft-bk" style="height: 40px;">
                                <a href="{{route('staff-detail',base64_encode($group2->id))}}">{{$group2->name}}</a> <br> 
                                 {{$group2->comment}}
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <!-- dong 2 -->
                <div style="margin-bottom: 20px;" class="slider1">
                    <div class="gr-rank-sliderAva" >
                        <img src="{{ asset('css/css/images/gigolo/img3.png')}}" alt="">
                    </div>
                </div>
                <div class="gr-rank-footer-p1">
                    @foreach ($million_god_staff as $group2)
                        @if($group2->position !=null)
                        <div class="col-md-2 col-xs-2 item" style="margin-bottom: 15px;">
                            <div class="av-main">
                                <div class="avt-lf">
                                    <a href="{{route('staff-detail',base64_encode($group2->id))}}"><img class="avt-img" src="{{ asset('uploads/'.$group2->image) }}" alt=""></a>
                                </div>
                            </div>

                            <div class="ft-bk">
                                {{$group2->position}}<br> 
                                <a href="{{route('staff-detail',base64_encode($group2->id))}}">{{$group2->name}}</a><br> 
                                {{$group2->comment}} 
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
window.onload = function(){
    var height = $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:first-child').height();
        $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:first-child img').height(height);
        $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:last-child img').height(height);
        width2 = $('.groupTop .group-rankking .gr-rank-footer-p1 .item div:first-child').width(); 
    $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main  div:first-child img').width(width2);
};
$(document).ready(function() {
    $( window ).resize(function() {
        var height = $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:first-child').height();
        $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:first-child img').height(height);
        $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main div:last-child img').height(height);
        width2 = $('.groupTop .group-rankking .gr-rank-footer-p1 .item div:first-child').width(); 
    $('.groupTop .group-rankking .gr-rank-footer-p1 .item .av-main  div:first-child img').width(width2);
    });
});
   
   
</script>
@endsection