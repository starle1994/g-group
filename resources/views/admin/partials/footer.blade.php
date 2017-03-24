<script>
  var options = {
    filebrowserImageBrowseUrl: '{{asset("laravel-filemanager?type=Images")}}',
    filebrowserImageUploadUrl: '{{asset("laravel-filemanager/upload?type=Images&_token=")}}{{csrf_token()}}',
    filebrowserBrowseUrl: '{{asset("laravel-filemanager?type=Files")}}',
    filebrowserUploadUrl: '{{asset("laravel-filemanager/upload?type=Files&_token=")}}{{csrf_token()}}'
  };
  CKEDITOR.replace('my-editor', options);
</script>
</body>
</html>