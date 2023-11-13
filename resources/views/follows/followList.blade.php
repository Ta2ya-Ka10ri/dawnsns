@extends('layouts.login')

@section('content')

<a>Follow list</a>

@foreach($others as $other)
<a href="/follow-profile/{{$other->id}}">
    <img src="/storage/img/{{$other->image}}" alt="">
</a>
<float:left>
@endforeach
<br>

@foreach($posts as $post)
<a href="/follow-profile/{{$post->id}}">
    <img src="/storage/img/{{$post->image}}" alt="">
</a>
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection