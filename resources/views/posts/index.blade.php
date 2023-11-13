@extends('layouts.login')

@section('content')

<div class='container'>
    <h2 class='page-header'>新しく投稿をする</h2>
    <form action='post/create'>
        <div class="form-group">
            <textarea name="newPost" id="" cols="75" rows="2" placeholder="何をつぶやこうか....？"></textarea>
        </div>
        <input type="image" src="images/post.png" >
    </form>
</div>
@foreach($posts as $post)
    <img src="/storage/img/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
    {!! Form::open(['url' => '/post/update']) !!}
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}

    {!! Form::close() !!}
<a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
<input type="image" src="images/trash_h.png" >
</a>

<div class="modalopen"  data-target="{{$post->id}}">
  <input type="image" src="images/edit.png" >
</div>
<!-- 1つ目のモーダルの中身 -->
<div class="modal-main js-modal" id="{{$post->id}}">
  <div class="modal-inner">
    <div class="inner-content">
      {!! Form::open(['url' => '/post/update']) !!}
          {!! Form::hidden('id', $post->id) !!}
          {!! Form::input('text', 'upPost', $post->post, ['required']) !!}
          <input type="image" src="images/edit.png" >
      {!! Form::close() !!}
    </div>
  </div>
</div>
<br>
@endforeach

@endsection