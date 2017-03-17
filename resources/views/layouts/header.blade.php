<header>
            <div id="logo">
                <div class="img-logo">
                   <div class="container-fluid">
                       <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <a href=""><img class="logoTop2" src="{{ asset('images/grouptop/logoGold.png') }}" alt=""></a>
                            </div>
                            <div class="col-xs-6">
                                <a href=""><img class="logoTop" src="{{ asset('images/grouptop/logoGroup.png') }}" alt=""></a>
                            </div>
                            <div class="col-sm-3 hidden-xs">
                                <a href=""><img class="logoTop" src="{{ asset('images/grouptop/logoGiga.png') }}" alt=""></a>
                            </div>
                       </div>
                   </div>
                </div>
                <div class="mapBanner">
                    <img class="bgLogo" src="{{ asset('images/grouptop/bg-logo.jpg') }}" alt="">
                </div>
                <img id="menu" class="visible-xs" src="{{ asset('images/menu.png') }}" alt="">
                <a href=""></a>
            </div>
            <div id="bannerMain">
                <img src="{{ asset('images/grouptop/banner-group.jpg') }}" alt="Flower">
                    <a class="a1Banner" href="banner1.html"></a>
                    <a class="a2Banner" href="banner2.html"></a>
            </div>
            <div id="mainMenu" >
                <img class="hidden-xs" src="{{ asset('images/grouptop/bg-menu.jpg') }}" alt="">
                <div class="ctMenu">
                    @foreach($categories as $cate)
                    <a href="">{{$cate->name}}</a>
                    @endforeach
                </div>
            </div>
        </header>