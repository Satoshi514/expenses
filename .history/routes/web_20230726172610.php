<?php

use Illuminate\Support\Facades\Route;
// ルーティングを設定するコントローラーを宣言する
use App\Http\Controllers\OutgoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Ajax\ExpenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[OutgoController::class,'index']);
Route::resource('posts',OutgoController::class);
Auth::routes(['verify' => true]);
Route::controller(UserController::class)->group(function () {
  route::get('users/mypage','mypage')->name('mypage');
  route::get('users/mypage','mypage')->name('users.mypage');
  route::get('users/mypage/edit','edit')->name('mypage.edit');
  route::put('users/mypage','update')->name('mypage.update');
  route::get('users/mypage/password/edit','edit_password')->name('mypage.edit_password');
  route::get('users/mypage/password', 'update_password')->name('mypage.update_password');
});

/*Route::get('posts',[OutgoController::class,'index'])->name('posts.index');*/
Route::get('/show',[OutgoController::class, 'show'])->name('posts.show');
Route::get('/create',[OutgoController::class, 'create'])->name('posts.create');
Route::post('/create',[OutgoController::class, 'create'])->name('posts.create');
Route::get('/edit',[OutgoController::class, 'edit'])->name('posts.edit');
Route::post('/edit',[OutgoController::class, 'edit'])->name('posts.edit');
Route::post('/posts/create',[OutgoController::class,'store'])->name('posts.store');
Route::patch('/posts/{outgo}',[OutgoController::class,'update'])->name('posts.update');
Route::delete('/posts/{outgo}',[OutController::class,'destroy'])->name('posts.destroy');

Route::get('ajax/outgos',[App\Http\Controllers\Ajax\OutgoController::class,'show']);
Route::get('ajax/posts/months',[App\Http\Controllers\Ajax\OutgoController::class,'months']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



