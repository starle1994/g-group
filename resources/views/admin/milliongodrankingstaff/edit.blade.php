@extends('admin.layouts.master')

@section('content')

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

{!! Form::model($milliongodrankingstaff, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.milliongodrankingstaff.update', $milliongodrankingstaff->id))) !!}

<div class="form-group">
    {!! Form::label('ranking_id', 'ranking*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('ranking_id', $ranking, old('ranking_id',$milliongodrankingstaff->ranking_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('name', 'name', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name',$milliongodrankingstaff->name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('image', 'image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('image') !!}
        {!! Form::hidden('image_w', 4096) !!}
        {!! Form::hidden('image_h', 4096) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('banner', 'banner', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('banner') !!}
        {!! Form::hidden('banner_w', 4096) !!}
        {!! Form::hidden('banner_h', 4096) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('executive_layer', 'Executiv_layer', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('executive_layer','') !!}
        {!! Form::checkbox('executive_layer', 1, $milliongodrankingstaff->executive_layer == 1) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.milliongodrankingstaff.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection