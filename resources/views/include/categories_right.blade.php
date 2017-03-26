@foreach(categories_right() as $right)
	<?php  $route = $right->alias ?>
   <div class="tableTop">
       <a href="{{route($route)}}"><img src="{{ asset('uploads/'.$right->image) }}" alt="{{$right->name}}"></a>
   </div>
@endforeach