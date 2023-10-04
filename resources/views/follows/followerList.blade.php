@extends('layouts.login')

@section('content')

<a>Follower list</a>

@foreach($others as $other)
<a href="/profile">
    <img src="/images/{{$other->image}}" alt="">
</a>
<float:left>
@endforeach
<br>

@foreach($posts as $post)
    <img src="/images/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection