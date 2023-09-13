@extends('layouts.login')

@section('content')

<a>Follow list</a>
@foreach($users as $user)
    <img src="/images/{{$user->image}}" alt="">
    {{$user->username}}
    {{$user->post}}
    {{$user->follow_id}}
@endforeach

@endsection