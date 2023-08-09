@extends('layouts.app')

@section('content')
   <h1 class="expense" style="color:red; justify-content:center;">家計簿アプリ</h1>
   <p class="master">「PHPとデータベースを連携したアプリケーション」成果物</p>
  <span class="button">
   <a href= "{{ route('users.mypage') }}" class="btn btn-danger mr-5">マイページ</a>
   <a href="{{ route('posts.show') }}" class="btn btn-info mx-5">支出グラフ</a>
   <a href= "{{ route('posts.outgo_create') }}" class="btn btn-success ml-5">登録</a>
  </span>
  <span class="d-flex justify-content-center">
  <img src="{{ asset('img/expense.png') }}" alt="expense" width="20%">
</span>

  <footer>
    <p class="copyright">&copy; 家計簿アプリ  All rights reserved.</p>
  </footer>

@endsection