@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
<div class="w-50">
   <h1>マイページ</h1>

   <hr>

  <div class="container">
      <div class="d-flex justify-content-between">
         <div class="row">
            <div class="col-2 d-flex align-items-center">
               <i class="fas fa-person fa-3x"></i>
            </div> 
            <div class="col-9 d-flex align-items-center ms-2 mt-3">
               <div class="d-flex flex-column">
                  <label for="user-name">会員情報の編集</label>
                  <p>アカウント情報の編集</p>
               </div>
            </div>
         </div>
         <div class="d-flex align-items-center">
           <a href="{{ route('mypage.edit')}}">
           <i class="fas fa-angles-right fa-2x"></i>
           </a>
         </div> 
      </div>
   </div>
   
  <hr>

   <div class="container">
      <div class="d-flex justify-content-between">
         <div class="row">
            <div class="col-1 d-flex align-items-center">
             <i class="fas fa-key fa-3x"></i>
            </div>
            <div class="col-9 d-flex align-items-center ms-2 mt-3">
               <div class="d-flex flex-column">
                <label for="user-name">パスワードの変更</label>
                <p>パスワードを変更します</p>
               </div>
            </div>
         </div>
         <div class="d-flex align-items-center">
           <a href="{{ route('mypage.edit_password') }}">
            <i class="fas fa-angles-right fa-2x"></i>
           </a>
         </div>
      </div>
   </div>
@endsection