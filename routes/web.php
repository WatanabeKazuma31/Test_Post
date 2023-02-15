<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});


// ログインページ表示
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('post',function(){
    return view('post.index',);
});

// 一覧表示(index)
Route::get('/index','App\Http\Controllers\PostController@index');


// 新規作成フォーム(create-form)
Route::get('/create-form','App\Http\Controllers\PostController@createForm');


// 新規作成(create)
Route::post('post/create','App\Http\Controllers\PostController@create')->middleware('auth');


// 検索(search)
Route::get('search','App\Http\Controllers\PostController@search')->middleware('auth');


// 削除
Route::get('/post/{id}/delete','App\Http\Controllers\PostController@delete')->middleware('auth');


// 更新フォーム(update-form)
Route::get('post/{id}/update-form','App\Http\Controllers\PostController@updateForm');


// 更新機能(update)
Route::post('/post/update','App\Http\Controllers\PostController@update')->middleware('auth');
