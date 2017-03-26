@extends('admin.layouts.master')

@section('content')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
{!! Form::open([ 'route' => config('quickadmin.route').'.restaurant.image.post', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
<div class="form-group">
    {!! Form::label('description', 'description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control ')) !!}
    </div>
</div>
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
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
</script>
@endsection