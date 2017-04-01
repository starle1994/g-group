@extends('admin.layouts.master')

@section('content')

{!! Form::open([ 'route' => config('quickadmin.route').'.featureevent.image.post', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
<div class="form-group">
    {!! Form::label('description', 'description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control ckeditor')) !!}
    </div>
</div>
{!! Form::hidden('id', $id) !!}
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