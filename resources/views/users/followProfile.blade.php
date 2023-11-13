@extends('layouts.login')

@section('content')

<img src="/storage/img/{{$users->image}}" alt="">
<p> Name {{$users->username}} </p>
<p> Bio {{$users->bio}} </p>
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
    <img src="/storage/img/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection