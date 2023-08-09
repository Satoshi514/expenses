@extends('layouts.app')

@section('content')

      <h1 class="new">支出新規登録</h1>
      <a href="{{ route('posts.income_create') }}"><button type=button class="btn btn-success"></button></a>
    <div class="data">
      <form action="{{ Route('posts.outgo_store') }}" method="post" class="mt-10">
        @csrf
          @component('components.create')
          @endcomponent

        <div class="mt-2">
          <label for="year">年</label>
          <input type="text" name="year">
        </div>

        <div class="mt-2">
          <label for="month">月</label>
          <input type="text" name="month">
        </div>

        <div class="mt-2">
          <label for="month">日</label>
          <input type="text" name="day">
        </div>

        <div class="mt-2">
          <label for="amount">金額</label>
          <input type="text" name="amount">
        </div>

        <div class="mt-2">
          <label for="description">メモ</label>
          <textarea name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success">登録</button>

      </form>
    </div>
   
  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>


@endsection