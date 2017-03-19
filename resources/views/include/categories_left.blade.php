@foreach(categories_left() as $left)
    <img src="{{ asset('uploads/'.$left->image) }}" alt="{{$left->name}}">
@endforeach