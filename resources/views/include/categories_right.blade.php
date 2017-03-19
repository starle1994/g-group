@foreach(categories_right() as $right)
   <div class="tableTop">
       <img src="{{ asset('uploads/'.$right->image) }}" alt="{{$right->name}}">
   </div>
@endforeach