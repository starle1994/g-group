<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>

<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('my-editor', options);
</script>
