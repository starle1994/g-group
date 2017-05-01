@extends('admin.layouts.master')

@section('content')
<h3>{{$restaurant->name}}</h3>
{!! Form::open([ 'route' => config('quickadmin.route').'.restaurant.image.post', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
@if($restaurant->CategoryLeft->id==3)
<div class="form-group">
    {!! Form::label('name', 'Question', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('name', old('description'), array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'answer', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control')) !!}
    </div>
</div>
@endif
{!! Form::hidden('restaurant_id', $id) !!}
<div class="form-group">
    {!! Form::label('image', 'image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
       <div>
            <h3>Upload Multiple Image By Click On Box</h3>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection