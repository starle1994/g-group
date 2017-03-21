@foreach(categories_2() as $left)
    <img src="{{ asset('uploads/'.$left->image) }}" alt="{{$left->name}}">
@endforeach