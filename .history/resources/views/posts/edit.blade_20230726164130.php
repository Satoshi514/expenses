@extends('layouts.app')

@section('content')

      <h1 class="edit">編集</h1>
    <div class="data">
      <form action="{{ Route('posts.update',) }}" method="post" class="mt-10">
        @csrf
        @method('patch')
        @foreach($data as $dat)
        <div>
          <label for="major_subject_name">項目</label>
          <input type="text" name="major_subject_name" value="{{ $data->major_subject_name }}">
        </div>

        <div class="mt-2">
          <label for="subject">詳細</label>
          <input type="text" name="subject" value="{{ $data->subject }}">
        </div>

        <div class="mt-2">
          <label for="year">年</label>
          <input type="text" name="year" value="{{ $data->year }}"> 
        </div>

        <div class="mt-2">
          <label for="month">月</label>
          <input type="text" name="month" value="$data->month">
        </div>

        <div class="mt-2">
          <label for="amount">金額</label>
          <input type="text" name="amount" value="{{ $data->amount }}">
        </div>

        <div class="mt-2">
          <label for="description">メモ</label>
          <textarea name="description">{{ $data->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">更新</button>
        <button type="submit" value="削除" onclic='return confirm("本当に削除しますか?")' class="btn btn-danger"></button>
      </form>
    </div>
    @endforeach
   
  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>


@endsection