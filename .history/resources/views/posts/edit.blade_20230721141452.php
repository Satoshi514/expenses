@extends('layouts.app')

@section('content')

      <h1 class="edit">編集</h1>
    <div class="data">
      <form action="{{ Route('posts.store') }}" method="post" class="mt-10">
        @csrf
        <div>
          <label for="major_subject_name">項目</label>
          <select name="major_subject_name">
            <option>食費</option>
            <option>住宅費</option>
            <option>光熱費</option>
            <option>日用品</option>
            <option>交際費</option>
            <option>交通費</option>
            <option>通信費</option>
            <option>娯楽費</option>
            <option>医療費</option>
            <option>教養・教育費</option>
            <option>衣服・美容費</option>
            <option>特別な支出</option>
            <option>雑費・その他</option>
          </select>
        </div>

        <div class="mt-2">
          <label for="subject">詳細</label>
          <select name="subject">
            <option>家賃</option>
          </select> 
        </div>

        <div class="mt-2">
          <label for="year">年</label>
          <input type="text" name="year">
        </div>

        <div class="mt-2">
          <label for="month">月</label>
          <input type="text" name="month">
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