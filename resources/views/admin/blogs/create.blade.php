@extends('admin.layouts.master')

@section('content')
<style>
   .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 150px;
      }
      .cropit-preview-image-container {
        cursor: move;
      }
      .cropit-preview-background {
        opacity: .2;
        cursor: auto;
      }
      .image-size-label {
        margin-top: 10px;
      }
      input, .export {
        /* Use relative position to prevent from being covered by image background */
        position: relative;
        z-index: 10;
        display: block;
      }
      button {
        margin-top: 10px;
      }
    </style>
<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.blogs.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('shopslist_id', 'ShopList*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('shopslist_id', $shopslist, old('shopslist_id'), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('content', 'content*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        <textarea id="my-editor" name="content" class="form-control">{!! old('content', '') !!}</textarea>

    </div>
</div><div class="form-group">
    {!! Form::label('image', 'image*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('image') !!}
        {!! Form::hidden('image_w', 4096) !!}
        {!! Form::hidden('image_h', 4096) !!}
        
    </div>
</div>
<div class="form-group">
  <div class="col-sm-2 control-label">
      Image
  </div>
  <div class="col-sm-10">
    <div class="image-editor">
      <input type="file" class="cropit-image-input" name="image_1">
      <div class="cropit-preview"></div>
      <div class="image-size-label">
        Resize image
      </div>
      <input type="range" class="cropit-image-zoom-input" >
       <input type="hidden" name="image-data" class="hidden-image-data"/>
      <p class="rotate-ccw">Click here to Rotate counterclockwise</p>
      <p class="rotate-cw">Click here to Rotate clockwise</p>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

<script src="{{ asset('js/jquery-2.0.0.min.js')}}"></script>
 <script>
      $(function() {
        $('.image-editor').cropit({
          exportZoom: 1.25,
          imageBackground: true,
          imageBackgroundBorderWidth: 20,
          imageState: {
            src: 'https://lorempixel.com/500/400/',
          },
        });
        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });
        $('form').submit(function() {
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);
        });
      });
    </script>
@endsection