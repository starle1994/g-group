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
            <img src="{{ asset('css/css/images/event/h1.png') }}" alt="">
        </div>
        
        <div class="exe-main-content">
            <div class="row">
            @foreach($events as $event)
                <div class="col-xs-6 exe-fa-content">
                    <a href="{{route('event-detail',$event->alias)}}">
                        <img src="{{ asset('uploads/'.$event->image)}}" alt="{{$event->name}}">
                    </a>
                </div>
            @endforeach
                
            </div>

           
        </div>
        
    </div>
   
</div>
@endsection