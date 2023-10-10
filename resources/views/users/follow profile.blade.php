@extends('layouts.login')

@section('content')

<img src="/images/{{$others->image}}" alt="">
<p> Name {{Auth::user()->username}} </p>
<p> Bio {{Auth::user()->bio}} </p>
<br>

@foreach($posts as $post)
    <img src="/images/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection