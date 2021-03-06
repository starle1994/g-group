 @extends('layouts.master')

@section('content')

	<div class="row event-item">
        <div class="col-sm-3  col-xs-12 shop-list-home-left"">
            <div class="exe-fa-line">
                 @include('include.categories_left2')
            </div>     
        </div>
        <div class="col-sm-9 right">
            <div class="title">
                <img src="{{ asset('css/css/images/event/h1.png') }}" alt="">
            </div>
            <div class="content">
                <div class="row top">
                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$event->image)}}" alt="">
                    </div>

                    <div class="col-sm-6 paraph">
                    <?php 
                        $date =isset($event->schedule->start_time) ? $event->schedule->start_time : '';
	                    $datetime = new DateTime($date) ; 
	                    $year = $datetime->format('Y');
	                    $month = $datetime->format('m');
	                    $day = $datetime->format('d');
	                    $time = $datetime->format('h:m');
	                ?>
                    @if(isset($event->schedule->start_time))
                        <p>
                            {{$year}}年{{$month}}月{{$day}}日　{{$time}}<br>
                        </p>
                    @endif
                        {!! $event->description !!}
                    </div>
                </div>

                <div class="dong-ke">
                    
                </div>
                <!-- loop -->
                <div style="margin-right: 0px; margin-left: 0px;"  class="row main ">
                @foreach($imgs as $image)
                    <div class="col-sm-6 avatar ">
                     
                            <img src="{{ asset('uploads/'.$image->image)}}" alt="">
                            <p>
                                {!! $image->description !!}
                            </p>
    
                    </div>
                 @endforeach
                   
                </div>
            </div>
        </div>
    </div>  
@endsection