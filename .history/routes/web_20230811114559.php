<?php

use Illuminate\Support\Facades\Route;
// ルーティングを設定するコントローラーを宣言する
use App\Http\Controllers\OutgoController;
use App\Http\Controllers\IncomeController;
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

Route::get('/',[IncomeController::class,'index']);
Route::resource('posts',OutgoController::class)->except((['edit']));
Auth::routes(['verify' => true]);
Route::controller(UserController::class)->group(function () {
  route::get('users/mypage','mypage')->name('mypage');
  route::get('users/mypage','mypage')->name('users.mypage');
  route::get('users/mypage/edit','edit')->name('mypage.edit');
  route::put('users/mypage','update')->name('mypage.update');
  route::get('users/mypage/password/edit','edit_password')->name('mypage.edit_password');
  route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
});

/*Route::get('posts',[OutgoController::class,'index'])->name('posts.index');*/
Route::get('/show',[OutgoController::class, 'show'])->name('posts.show');
Route::get('/outgo_create',[OutgoController::class, 'outgo_create'])->name('posts.outgo_create');
Route::post('/outgo_create',[OutgoController::class, 'outgo_create'])->name('posts.outgo_create');
Route::get('/posts/{outgo}/edit',[OutgoController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{outgo}/edit',[OutgoController::class, 'edit'])->name('posts.edit');
Route::post('outgo_create',[OutgoController::class,'outgo_store'])->name('posts.outgo_store');
Route::put('/{outgo}',[OutgoController::class,'update'])->name('posts.update');
Route::delete('/{outgo}',[OutgoController::class,'destroy'])->name('posts.destroy');

Route::get('/income_create',[IncomeController::class,'income_create'])->name('posts.income_create');
Route::post('/income_create',[IncomeController::class,'income_create'])->name('posts.income_create');
Route::post('/income_create',[IncomeController::class,'income_store'])->name('posts.income_store');
Route::delete('/{income}',[IncomeController::class,'destroy'])->name('posts.destroy');

Route::get('ajax/outgos',[App\Http\Controllers\Ajax\OutgoController::class,'show']);
Route::get('ajax/posts/months',[App\Http\Controllers\Ajax\OutgoController::class,'months']);
Route::get('ajax/posts/years',[App\Http\Controllers\Ajax\OutgoController::class,'years']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');