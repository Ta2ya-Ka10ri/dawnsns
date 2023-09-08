@extends('layouts.login')

@section('content')
<img src="/images/{{$post->image}}" alt="">
{{$user->username}}
{{$user->mail}}
{{$user->password}}
{{$user->bio}}
{{$user->image}}
{{$user->created_at}}

@endsection