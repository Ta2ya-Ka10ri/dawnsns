@extends('layouts.login')

@section('content')

<a>Follower list</a>

@foreach($posts as $post)
<img src="/images/{{$post->image}}" alt="">
{{$post->follower_id}}
@endforeach

@endsection