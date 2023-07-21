@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('mypage.update_password') }}">
  <input type="hidden" name="_method" value="PUT">
  <div class="password">
    <label for="password" class="pass">新しいパスワード</label>
    
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for"password-confirm">確認用</label>
    <input id ="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-danger">
      パスワード更新
    </button>
  </div>
</form>
@endsection