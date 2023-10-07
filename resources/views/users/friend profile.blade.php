@extends('layouts.login')

@section('content')

<img src="/images/{{$other->image}}" alt="">
<p> Name {{$users->username}} </p>
<p> Bio {{$users->bio}} </p>
<br>

@foreach($users as $user)
    <img src="/images/{{$user->image}}" alt="">
    {{$user->username}}
    @if($follows->contains($user->id))
    <form action='/un-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローを外す">
    </form>
    @else
    <form action='/add-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローする">
    </form>
    @endif
    <br>
@endforeach

@foreach($posts as $post)
<img src="/images/{{$post->image}}" alt="">

{{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
<br>
@endforeach

@endsection