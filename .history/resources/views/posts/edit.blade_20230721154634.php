@extends('layouts.app')

@section('content')

      <h1 class="edit">編集</h1>
    <div class="data">
      <form action="{{ Route('posts.store') }}" method="post" class="mt-10">
        @csrf
        @foreach ($datas as $data )
        <div>
          <label for="major_subject_name">項目</label>
          <input type="text" name="major_subject_name">
        </div>

        <div class="mt-2">
          <label for="subject">詳細</label>
          <select name="subject">
            <option>家賃</option>
          </select> 
        </div>

        <div class="mt-2">
          <label for="year">年</label>
          <input type="text" name="year"> "{{ $data->major_subject_name }}"
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

        <button type="submit" class="btn btn-success">編集</button>
        <button type="sybmit" class="btn btn-danger">削除</button>
        @endforeach
      </form>
    </div>
   
  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>


@endsection