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
            <img src="{{ asset('css/css/images/movie/h3.jpg') }}" alt="">
        </div>
        
        <div class="exe-main-content">
       
       
        <div class="row">
        @foreach($movies as $item)       
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
                <div class="col-xs-6 exe-fa-content">
                    <div class="item-video">                                                      
                            <div class="catgimg_container" data-toggle="modal" data-target="{{$target_1}}">
                              <img src="{!! $thumbURL !!}" class="img-responsive">
                              <span class="td-video-play-ico">
                                 <img width="40" class="td-retina" src="{!! asset('css/img/ico-video-large.png') !!}" alt="video">
                             </span>
                            </div>
                            <div class="title-image">
                              <p class="post_titile"><a href="">{{$item->name}}</a></p>
                              <div class="comments_box" > <span class="meta_date">{{$item->created_at}}</span> </div>
                            </div>                                                       
                    </div>

                    <div id="{{$target}}" class="modal fade" data-backdrop="static"  >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">{{$item->name}}</h4>
                            </div>
                            <div class="embed-responsive embed-responsive-16by9" class="modal-body" >
                              <iframe  src="{{$item->link}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                  </div> 
            </div>         
        @endforeach   
        </div>        
        </div>
        


    </div>
   
</div>
<script>
  $(".modal").on('hidden.bs.modal', function (e) {
    var ele = $(this).find("iframe");
    ele.attr("src",ele.attr("src"));
  });
</script>
@endsection