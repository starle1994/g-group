@extends('layouts.master')

@section('content')
<div class="row exe-fa">
                        <div class="col-sm-3">
                            <div class="exe-fa-line">
                                @include('include.categories_left')
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="exe-fa-head-1">
                                <img src="{{ asset('css/css/images/dialogue/h1.jpg') }}" alt="">
                            </div>

                            <div class="dialogue-main-content">
                            @foreach($dialogs as $item)
                                <div class="parap">
                                    <p>
                                        <!--G’s group ???<br>
                                        5????????????     !!<br>
                                        ??????????????!!-->
                                        <?php echo $item->name; ?>
                                    </p>
                                    <p><?php echo $item->description; ?></p>

                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">

                                        <?php
                                            if ($item->image == null) {
                                                $embedCode = '<iframe src="'.$item->link.'" frameborder="0" allowfullscreen></iframe>';
                                                preg_match('/src="([^"]+)"/', $embedCode, $match);

                                                // Extract video url from embed code
                                                $videoURL = $match[1];
                                                $urlArr = explode("/",$videoURL);
                                                $urlArrNum = count($urlArr);

                                                // YouTube video ID
                                                $youtubeVideoId = $urlArr[$urlArrNum - 1];

                                                // Generate youtube thumbnail url
                                                $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
                                            }else{
                                                $thumbURL = asset('uploads/'.$item->image);
                                            }

                                            $target = 'myModal-'.$item->id ;
                                            $target_1= '#'.$target ;
                                            ?>

                                            <?php $target = 'myModal-'.$item->id ; $target_1= '#'.$target ?>

                                        <a href="{{route('dialogue-detail',$item->alias)}}">
                                            <img src="{!! $thumbURL !!}" alt="">
                                        </a>



                                    </div>
                                </div>
                            <div class="exe-fa-paganitor">
                                <img src="{{ asset('css/css/images/rookie-feature/h2.png') }}" alt="">
                            </div>
                                @endforeach

                        </div>

                    </div>
                </div>
@endsection