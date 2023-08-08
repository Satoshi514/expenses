@extends('layouts.app')

@section('content')

      <h1 class="text-center">編集</h1>
    <div class="update">
      <form action="{{ route('posts.update', $outgo) }}" enctype="multipart/form-data" method="post" class="mt-10">
        @csrf
        @method('put')
        <div class="text-center">
          <label for="major_subject_name">項目</label>
          <input type="text" name="major_subject_name" value="{{ $outgo->major_subject_name }}">
        </div>

        <div class="mt-2 text-center">
          <label for="subject">詳細</label>
          <input type="text" name="subject" value="{{ $outgo->subject }}">
        </div>

        <div class="mt-2 text-center">
          <label for="year">年</label>
          <input type="text" name="year" value="{{ $outgo->year }}"> 
        </div>

        <div class="mt-2 text-center">
          <label for="month">月</label>
          <input type="text" name="month" value="{{ $outgo->month }}">
        </div>

        <div class="mt-2 text-center">
          <label for="month">日</label>
          <input type="text" name="day" value="{{ $outgo->day }}">
        </div>

        <div class="mt-2 text-center">
          <label for="amount">金額</label>
          <input type="text" name="amount" value="{{ $outgo->amount }}">
        </div>

        <div class="mt-2 text-center">
          <label for="description">メモ</label>
          <textarea name="description">{{ $outgo->description }}</textarea>
        </div>
        
        <button type="submit" name="update" value="更新" class="btn btn-success">更新</button>
      </form>
    </div>
   
  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>
@endsection