@extends('admin.layouts.master')

@section('content')
<style>
   .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
         width: 450px;
        height: 340px;
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
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($movies, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.movies.update', $movies->id))) !!}

<div class="form-group">
    {!! Form::label('name', 'name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name',$movies->name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('link', 'link*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('link', old('link',$movies->link), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
  <div class="col-sm-2 control-label">
      Image
  </div>
  <div class="col-sm-10">
    <p>Image you can upload or not if you wanna</p>
    <p style="color: red">but if you upload image, width must biger than 450px and height must biger than 350px</p>
    <div class="image-editor">
      <input type="file" class="cropit-image-input" name="image">
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
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.movies.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection