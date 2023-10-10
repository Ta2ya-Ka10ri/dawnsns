@extends('layouts.login')

@section('content')

<img src="/images/{{$other->image}}" alt="">
<p> Name {{$users->username}} </p>
<p> Bio {{$users->bio}} </p>
<br>


@endsection