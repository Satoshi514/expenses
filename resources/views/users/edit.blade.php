@extends('layouts.app')

@section('content')

<span>
  <a href="{{ route('users.mypage') }}">マイページ</a> > 会員情報の編集
</span>

<h1>会員情報の編集</h1>
<hr>
 <form method="POST" action="{{ route('users.mypage') }}">
  @csrf
 <input type="hidden" name="_method" value="PUT">
<div class="form-group">
  <div class="username">
    <lavel for="user-name">氏名</label>
  </div>
  <div class="collpase show editUserName">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder= "山田　太郎">
    @error('name')
    <span class="invalid-feedback" alert="alert">
      <strong>氏名を入力してください</strong>
    </span>
    @enderror
  </div>
</div>
<br>

<div class="form-group">
  <div class="username">
    <lavel for="user-email">メールアドレス</label>
  </div>
  <div class="collpase show editUserMail">
    <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder= "xxxxxxx@xxxxxxx.com">
    @error('email')
    <span class="invalid-feedback" alert="alert">
      <strong>メールアドレスを入力してください</strong>
    </span>
    @enderror
    

    <hr>
    <button type="submit" class="btn btn-primary">
    保存
    </button>
 <form>
</div>
@endsection