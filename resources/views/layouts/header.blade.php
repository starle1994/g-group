<header>
            <div id="logo">
                <div class="img-logo">
                   <div class="container-fluid">
                       <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <a href=""><img class="logoTop2" src="{{ asset('css/css/images/grouptop/logoGold.png') }}" alt=""></a>
                            </div>
                            <div class="col-xs-6">
                                <a href=""><img class="logoTop" src="{{ asset('css/css/images/grouptop/logoGroup.png') }}" alt=""></a>
                            </div>
                            <div class="col-sm-3 hidden-xs">
                                <a href=""><img class="logoTop" src="{{ asset('css/css/images/grouptop/logoGiga.png') }}" alt=""></a>
                            </div>
                            <img id="menu" class="visible-xs" src="{{ asset('css/css/images/menu.png') }}" alt="">
                <a href=""></a>
                       </div>
                   </div>

                </div>

                <div class="mapBanner">
                    <img class="bgLogo" src="{{ asset('css/css/images/grouptop/bg-logo.jpg') }}" alt="">
                </div>
                
            </div>
            <div style="clear: both;"> </div>
            <div id="bannerMain">
               <img src="{{ asset('uploads/'.$banner->image) }}" alt="Flower">
                @if($banner->page==1)
                    <a class="a1Banner" href="{{route('million-god')}}"></a>
                    <a class="a2Banner" href="{{route('gigoro')}}"></a>
                @endif
            </div>
            <div id="mainMenu" >
                <img class="hidden-xs" src="{{ asset('css/css/images/grouptop/bg-menu.jpg') }}" alt="">
                <div class="ctMenu">
                    @foreach(categories() as $cate)
                    <?php  $route = $cate->alias ?>
                    <a href="{{route($route)}}">{{$cate->name}}</a>
                    @endforeach
                </div>
            </div>
        </header>