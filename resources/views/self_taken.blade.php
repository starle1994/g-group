@extends('layouts.master')

@section('content')
<div class="row exe-fa">
    <div class="col-sm-3  col-xs-12 shop-list-home-left"">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>

    <div class="col-sm-9">
        <div class="exe-fa-head-1">
            <img src="{{ asset('css/css/images/self-taken/h.jpg') }}" alt="">
        </div>        
        <div class="self-taken-main-content" style="background-color: white">
            <div class="item">
                <div class="row">
                <?php
                       $dateOld = null;             
                ?>   
                @foreach($self_taken as $item)
                    <?php
                        $date = $item->time;                
                    ?>
                    @if($date != $dateOld && $dateOld != null)
                        </div>
                        <div style="text-align: right;margin-right: 2%;font-size: 24px">
                             <?php 
                                $datetime = new DateTime($dateOld) ; 
                                $year = $datetime->format('Y');
                                $month = $datetime->format('m');
                                $day = $datetime->format('d');
                            ?>
                            <p>
                                {{$year}}年{{$month}}月{{$day}}日 <br>
                            </p>
                        </div>                        
                            </div>
                        <div class="self-taken-line">                            
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 self-taken-content">
                                    <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                                </div> 
                    @else                
                            <div class="col-xs-4 col-md-4 self-taken-content">
                                <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                            </div>                            
                    @endif
                    <?php
                        $dateOld = $date;
                    ?>            
                @endforeach
                </div>
            </div>
            <div style="text-align: right;margin-right: 2%;font-size: 24px">
                <?php 
                    $datetime = new DateTime($dateOld) ; 
                    $year = $datetime->format('Y');
                    $month = $datetime->format('m');
                    $day = $datetime->format('d');
                ?>
                <p>
                    {{$year}}年{{$month}}月{{$day}}日 <br>
                </p>
            </div> 
            <div class="self-taken-line">                            
             </div>
        </div>

        

    </div>
</div>
@endsection