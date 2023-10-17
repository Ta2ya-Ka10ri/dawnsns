@extends('layouts.login')

@section('content')

<img src="/images/{{$others->image}}" alt="">
<p> Name {{Auth::user()->username}} </p>
<p> Bio {{Auth::user()->bio}} </p>
<br>

@if($follows->contains($users->id))
    <form action='/un-follow'>
        <input name="id" value="{{$users->id}}" type="hidden">
        <input type="submit" value="フォローを外す">
    </form>
    @else
    <form action='/add-follow'>
        <input name="id" value="{{$users->id}}" type="hidden">
        <input type="submit" value="フォローする">
    </form>
@endif
    <br>

@foreach($posts as $post)
    <img src="/images/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection