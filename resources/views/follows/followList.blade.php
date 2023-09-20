@extends('layouts.login')

@section('content')

<a>Follow list</a>

@foreach($others as $other)
    <img src="/images/{{$other->image}}" alt="">
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