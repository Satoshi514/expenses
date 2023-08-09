@extends('layouts.app')

@section('content')

<h1 class="text-center">収入新規登録</h1>
<a href="{{ route('posts.outgo_create') }}"></a>
<div>
<form action="{{ route('posts.income_store') }}" method="post">
  @csrf

 <div class="text-center">
  <label for="major_category">項目</label>
  <input type="text" name="major_category">
 </div>

 <div class="mt-2 text-center">
  <label for="category">詳細</label>
  <input type="text" name="categry">
 </div>

 <div class="mt-2 text-center">
  <label for="year">年</label>
  <input type="text" name="year">
 </div>

 <div class="mt-2 text-center">
  <label for="month">月</label>
  <input type="text" name="month">
 </div>

  <div class="mt-2 text-center">
   <label for="month">日</label>
   <input type="text" name="day">
  </div>

   <div class="mt-2 text-center">
    <label for="amount">金額</label>
    <input type="text" name="amount">
   </div>

   <div class="mt-2 text-center">
    <label for="description">メモ</label>
    <textarea name="description"></textarea>
   </div>

   <button type="submit" class="btn btn-success text-center">登録</button>

  </form>
</div>
   
  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>


@endsection