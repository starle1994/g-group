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
                                <img src="{{ asset('css/css/images/rookie-feature/h1.png') }}" alt="">
                            </div>
                            
                            <div class="dialogue-main-content">

                                <div class="parap">
                                    <p>
                                        G’s group が誇る<br>
                                        5名のイケメン達、、、通称　　　　　!!<br>
                                        彼らによる夢の対談を見逃すな!!
                                    </p>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">
                                        <img src="images/dialogue/anh1.jpg" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">
                                        <img src="images/dialogue/anh1.jpg" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">
                                        <img src="images/dialogue/anh1.jpg" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 dialogue-content">
                                        <img src="images/dialogue/anh1.jpg" alt="">
                                    </div>
                                </div>

                                
                            

                            <div class="exe-fa-paganitor">
                                <img src="images/rookie-feature/h2.png" alt="">
                            </div>

                        </div>
                       
                    </div>
                </div>
@endsection