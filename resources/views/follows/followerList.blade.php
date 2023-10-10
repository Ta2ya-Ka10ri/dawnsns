@extends('layouts.login')

@section('content')

<a>Follower list</a>

@foreach($others as $other)
<a href="/follower profile">
    <img src="/images/{{$other->image}}" alt="">
</a>
<float:left>
@endforeach
<br>

@foreach($posts as $post)
<a href="/follower profile">
    <img src="/images/{{$post->image}}" alt="">
</a>
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection