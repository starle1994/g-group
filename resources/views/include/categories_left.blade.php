@foreach(categories_left() as $left)
	<?php  $route = $left->alias ?>
    <a href="{{route($route)}}"><img src="{{ asset('uploads/'.$left->image) }}" alt="{{$left->name}}"></a>
@endforeach