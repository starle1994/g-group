 @extends('layouts.master')

@section('content')
	<div class="row event-item">
        <div class="col-sm-3 left">
            @include('include.categories_left2')
        </div>

        <div class="col-sm-9 right">
            <div class="title">
                <img src="images/rookie-feature/h1.png" alt="">
            </div>
            
            <div class="content">
                <div class="row top">
                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$event->image)}}" alt="">
                    </div>

                    <div class="col-sm-6 paraph">
                    <?php 
	                    $datetime = new DateTime($event->schedule->start_time) ; 
	                    $year = $datetime->format('Y');
	                    $month = $datetime->format('m');
	                    $day = $datetime->format('d');
	                    $time = $datetime->format('h:m');
	                ?>
                        <p>
                            {{$year}}年{{$month}}月{{$day}}日　{{$time}}（水） <br>
                        </p>
                        {!! $event->description !!}
                    </div>
                </div>

                <div class="dong-ke">
                    
                </div>
                <!-- loop -->
                <div class="row main">
                @foreach($event->eventsfeatureimage as $image)
                    <div class="col-sm-6 avatar">
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