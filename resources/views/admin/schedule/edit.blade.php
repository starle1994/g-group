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
        height: 250px;
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

{!! Form::model($schedule, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.schedule.update', $schedule->id))) !!}
<div class="form-group">
    {!! Form::label('shopslist_id', 'ShopList*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('shopslist_id', $shopslist, old('shopslist_id',$schedule->shopslist_id), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('name_event', 'name_event*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name_event', old('name_event',$schedule->name_event), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'description*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', old('description',$schedule->description), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('start_time', 'start_time*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('start_time', old('start_time',$schedule->start_time), array('class'=>'form-control datetimepicker')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('end_time', 'end_time*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('end_time', old('end_time',$schedule->end_time), array('class'=>'form-control datetimepicker')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'color*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('event_type', array_event(), old('event_type',$schedule->event_type), array('class'=>'form-control')) !!}
        
        
    </div>
</div>
<div class="form-group">
  <div class="col-sm-2 control-label">
      Image
  </div>
  <div class="col-sm-10">
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
      {!! link_to_route(config('quickadmin.route').'.schedule.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
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