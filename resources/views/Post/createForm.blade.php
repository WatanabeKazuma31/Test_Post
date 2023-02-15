@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="title">CreateForm</h1>

    <form action="/post/create" class="form-group" method="post">
      @csrf
      <input type="text" class="name-box" name="newName" placeholder="名前を入力" value="{{old('newName')}}"></input>
      @if($errors->has('newName'))
      <p class="v-msg">{{ $errors->first('newName') }}</p>
      @endif
      <textarea name="newPost" class="form-control" placeholder="投稿内容を入力">{{ old('newPost') }}</textarea>
      @if($errors->has('newPost'))
      <p class="v-msg">{{ $errors->first('newPost') }}</p>
      @endif
      <button class="sub-button" type="submit">投稿する</button>
    </form>

    <div class="top button_file">
      <a href="/index">TOPへ戻る</a>
    </div>

  </div>
@endsection
