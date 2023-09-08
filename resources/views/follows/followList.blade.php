@extends('layouts.login')

@section('content')

<a>Follow list</a>
@foreach($follows as $follow)
    <img src="/images/{{$follow->image}}" alt="">
    {{$follow->follow_id}}
@endforeach

@endsection