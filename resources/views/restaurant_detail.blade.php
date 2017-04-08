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
                <img src="{{ asset('css/css/images/rookie-feature/res.jpg') }}" alt="">
            </div>
            <div class="content">
                <div class="row top">
                    <div class="col-sm-6 avt-parent">
                        <img src="{{ asset('uploads/'.$restaurant->image)}}" alt="{{$restaurant->name}}">
                    </div>

                    <div class="col-sm-6 paraph">
                        {!! $restaurant->description !!}
                    </div>
                </div>

                <div class="dong-ke">
                    
                </div>
                <!-- loop -->
                <div style="margin-right: 0px; margin-left: 0px;"  class="row main">
                    @foreach($imagerestaurant as $item)
                       <div class="col-sm-6 " style="margin-top: 5px">
                           <img src="{{ asset('uploads/'.$item->image)}}" alt="{{$item->name}}" class="img-responsive">
                       </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    window.onload = function(){
        var height = $('.groupTop .right .content .main .avatar:first-child img').height();      
                $('.groupTop .right .content .main .avatar img').height(height);
                height = $('.groupTop .right .content .main .avatar:first-child img').height();        
                $('.groupTop .right .content .main .avatar img').height(height);  
        };
    $(document).ready(function () {  
         
        $( window ).resize(function() {
            var height = $('.groupTop .right .content .main .avatar:first-child img').height();      
            $('.groupTop .right .content .main .avatar img').height(height);
            height = $('.groupTop .right .content .main .avatar:first-child img').height();        
            $('.groupTop .right .content .main .avatar img').height(height);  
        });
});
</script>   
@endsection