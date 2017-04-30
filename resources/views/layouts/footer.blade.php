<div class="md-hidden">
	<div class="row"><div class="col-xs-6"><p><お問い合わせ></p></div></div>
	
	<div class="row" style="margin-top: 10px">
		<div class="col-xs-6">
			<p>{!! $shop_list[0]->contact !!}</p>
		</div>
		<div class="col-xs-6">
			 <img src="{{asset('uploads/'.$shop_list[0]->image_intro)}}" alt="" class="img-responsive">
		</div>
	</div>
	<div class="row" style="margin-top: 10px">
		<div class="col-xs-6">
			<p>{!! $shop_list[1]->contact !!}</p>
		</div>
		<div class="col-xs-6">
			 <img src="{{asset('uploads/'.$shop_list[1]->image_intro)}}" alt="" class="img-responsive">
		</div>
	</div>
</div>
<div class="copyRight">
    <img src="{{ asset('css/css/images/grouptop/logoGroup.png')}}" alt="">
    <p>Copyright(C)nagoya-gsgroup.com</p>
</div>
<div class="ftRight">
    18歳未満の方のご入店、<br> 及びサイトの閲覧はお断りしております事をご了承下さい。
</div>
