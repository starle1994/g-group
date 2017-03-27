@extends('layouts.master')

@section('content')
<div class="row exe-fa">
    <div class="col-sm-3">
        <div class="exe-fa-line">
             @include('include.categories_left2')
        </div>     
    </div>

    <div class="col-sm-9">
        <div class="exe-fa-head-1">
            <img src="{{ asset('css/css/images/h1.png') }}" alt="">
        </div>        
        <div class="self-taken-main-content" style="background-color: white">
            <div class="item">
                <div class="row">
                <?php
                       $dateOld = null;             
                ?>   
                @foreach($fashions as $item)
                    <?php
                        $date = $item->time;                
                    ?>
                    @if($date != $dateOld && $dateOld != null)
                        </div>
                        <div style="text-align: right;margin-right: 2%;font-size: 24px">
                            {{$dateOld}}
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
                {{$dateOld}}
            </div> 
            <div class="self-taken-line">                            
             </div>
        </div>      
    </div>
</div>
@endsection