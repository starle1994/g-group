@extends('layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row group-rankking">

                    <div class="col-sm-7 col-xs-12 home-left">
                        <div class="row gr-rank-lineSli">
                            <div class="col-xs-3" id="lineImg">
                                @include('include.categories_left')
                            </div>
                            <div class="col-xs-9">
                               <div class="slider1">
                                    <div class="gr-rank-sliderAva">
                                        <img src="../images/group-rankking/g5.jpg" alt="">
                                    </div>
                               </div>
                               <div class="gr-rank-slider2">
                                    <div class=" row gr-rank-containerSlider">
                                        <div style="padding: 0px" class="col-md-6 col-sm-12 lf">
                                            <div class="bk-left">
                                                <img style="width: 100%" src="../images/group-rankking/bk2.png" alt="">
                                            </div>
                                            
                                            <div class="avt-left">
                                                <img style="width: 100%" src="{{ asset('uploads/'.$group_ranking[0]->godstaffs->image) }}" alt="">
                                            </div>

                                        </div>

                                        <div style="padding: 0px" class="col-md-6 col-sm-12 right">
                                            <div class="avt-left">
                                                <ul>
                                                    <li><img src="images/group-rankking/m1.png" alt=""></li>
                                                    <li class="txt">1樹</li>
                                                    <li><img src="images/group-rankking/m1.png" alt=""></li>
                                                </ul>

                                                <div class="txt-2">
                                                   {{$group_ranking[0]->godstaffs->position}} <br>
                                                    {{$group_ranking[0]->godstaffs->name}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>


                                <div class="gr-rank-p2">
                                   <div class="row contents">
                                        @for( $i= 1 ;$i<=2; $i++)

                                            <div class="col-sm-6">
                                                @if($group_ranking[$i]->ranking_id ==2)
                                                    <?php $image = '../images/group-rankking/2st.jpg' ?>
                                                @elseif($group_ranking[$i]->ranking_id ==3)
                                                    <?php $image = '../images/group-rankking/3st.jpg' ?>
                                                @endif
                                                <div class="title">
                                                   <img src="{{$image}}" alt="">
                                                </div>
                                                
                                                <div class="av-main">
                                                    <div class="bg-lf">
                                                        <img src="../images/group-rankking/bk3.png" alt="">
                                                    </div>

                                                    <div class="avt-lf">
                                                        <img src="{{ asset('uploads/'.$group_ranking[$i]->godstaffs->image) }}" alt="">
                                                    </div>
                                                </div>

                                                <div class="ft-bk">
                                                    {{$group_ranking[$i]->name}}
                                                </div>
                                            </div>
                                        @endfor
                                   </div>
                                </div>

                                <div class="gr-rank-p2">
                                   <div class="row contents">
                                        @for( $i= 4 ;$i<=5; $i++)
                                            <div class="col-sm-6">
                                                @if($group_ranking[$i]->ranking_id ==2)
                                                    <?php $image = '../images/group-rankking/2st.jpg' ?>
                                                @elseif($group_ranking[$i]->ranking_id ==3)
                                                    <?php $image = '../images/group-rankking/3st.jpg' ?>
                                                @elseif($group_ranking[$i]->ranking_id ==4)
                                                    <?php $image = '../images/group-rankking/4st.jpg' ?>
                                                @elseif($group_ranking[$i]->ranking_id ==5)
                                                    <?php $image = '../images/group-rankking/5st.jpg' ?>
                                                @endif
                                                <div class="title">
                                                   <img src="{{$image}}" alt="">
                                                </div>
                                                
                                                <div class="av-main">
                                                    <div class="bg-lf">
                                                        <img src="../images/group-rankking/bk3.png" alt="">
                                                    </div>

                                                    <div class="avt-lf">
                                                        <img src="{{ asset('uploads/'.$group_ranking[$i]->godstaffs->image) }}" alt="">
                                                    </div>
                                                </div>

                                                <div class="ft-bk">
                                                    {{$group_ranking[$i]->name}}
                                                </div>
                                            </div>
                                        @endfor
                                   </div>
                                </div>

                                <!-- dong 1 -->
                                <div style="margin-top: 30px" class="slider1">
                                    <div class="gr-rank-sliderAva">
                                        <img src="../images/group-rankking/H2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="gr-rank-footer-p1">
                                    @foreach ($group_ranking as $group)
                                        @if($group->ranking_id ==1)
                                                    <?php $image = '../images/group-rankking/l1.jpg' ?>
                                                @elseif($group->ranking_id ==2)
                                                    <?php $image = '../images/group-rankking/l2.jpg' ?>
                                                @elseif($group->ranking_id ==3)
                                                    <?php $image = '../images/group-rankking/l3.jpg' ?>
                                                @elseif($group->ranking_id ==4)
                                                    <?php $image = '../images/group-rankking/l4.jpg' ?>
                                                @elseif($group->ranking_id ==5)
                                                    <?php $image = '../images/group-rankking/l5.jpg' ?>
                                                @elseif($group->ranking_id ==6)
                                                    <?php $image = '../images/group-rankking/l6.jpg' ?>
                                                @elseif($group->ranking_id ==7)
                                                    <?php $image = '../images/group-rankking/l7.jpg' ?>
                                                @elseif($group->ranking_id ==8)
                                                    <?php $image = '../images/group-rankking/l8.jpg' ?>
                                                @elseif($group->ranking_id ==9)
                                                    <?php $image = '../images/group-rankking/l9.jpg' ?>
                                                @elseif($group->ranking_id ==10)
                                                    <?php $image = '../images/group-rankking/l10.jpg' ?>
                                        @endif
                                        <div class="col-xs-2 item">
                                            <div class="title">
                                               <img src="{{$image}}" alt="">
                                            </div>
                                            
                                            <div class="av-main">
                                                <div class="avt-lf">
                                                    <img src="{{ asset('uploads/'.$group->godstaffs->image) }}" alt="">
                                                </div>
                                            </div>

                                            <div class="ft-bk">
                                                     {{$group->name}}
                                                </div>
                                        </div>
                                    @endforeach
                                    
                                </div>


                                <!-- dong 2 -->
                                <div style="margin-top: 30px" class="slider1">
                                    <div class="gr-rank-sliderAva">
                                        <img src="../images/group-rankking/H2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="gr-rank-footer-p1">
                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l1.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img class="avt-img" src="images/group-rankking/anh1.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>

                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l2.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh2.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l3.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh3.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l4.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh4.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l5.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh5.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>
                                
                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l6.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img class="avt-img" src="images/group-rankking/anh6.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>

                                    <div class="col-xs-2 col-md-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l7.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh7.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>

                                    <div class="col-xs-2 col-md-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l8.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh8.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>

                                    <div class="col-xs-2 col-md-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l9.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh9.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>

                                    <div class="col-md-2 col-xs-2 item">
                                        <div class="title">
                                           <img src="images/group-rankking/l10.jpg" alt="">
                                        </div>
                                        
                                        <div class="av-main">
                                            <div class="avt-lf">
                                                <img src="images/group-rankking/anh10.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="ft-bk">
                                                V3達成!! <br>要
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                   <div class="col-sm-5 col-xs-12">
                        @include('include.categories_right')
                       
                   </div>
                </div>
            </div>

@endsection