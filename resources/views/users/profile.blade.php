@extends('layouts.login')

@section('content')

<img src="/images/{{$user->image}}" alt="">

{{ Form::label('UserName') }}
<input class="form-control" id="Auth::user()" placeholder={{Auth::user()->username}} {!! Form::open(['url' => '/user/update']) !!}
        {!! Form::hidden('id', $user->id) !!}
        {!! Form::input('text', 'upPost', $user->user, ['required', 'class' => 'form-control']) !!}>
        {!! Form::close() !!}

<br>

{{ Form::label('MailAddress') }}
<input class="form-control" id="Auth::user()" placeholder={{Auth::user()->mail}} name="Auth::user()" type="text">
<br>

{{ Form::label('Password') }}
<input type="password" id="password" placeholder=●●●●●●● name="password" type="text">
<br>

{{ Form::label('new Password') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
<br>

{{ Form::label('Bio') }}
{{ Form::text('bio',null,['class' => 'input']) }}
<br>

{{ Form::label('Icon Image') }}
{{ Form::text('icon image',null,['class' => 'input']) }}
<br>

<button type="submit" class="btn btn-primary pull-right">更新</button>



@endsection