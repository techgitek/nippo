<?php

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

Route::get('/', 'NippoesController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('nippoes', 'NippoesController');
});

// 詳細画面
//Route::get('nippoes/{id}', 'NippoesController@show');
// edit: 更新用のフォームページ
//Route::get('nippoes/{id}/edit', 'NippoesController@edit')->name('nippoes.edit');

//コメントする
Route::post('nippoes/comments/', 'CommentsController@store')->name('comments.store');
;



//Route::resource('comment', 'CommentsController');


//Route::put('nippoes/{id}', 'MessagesController@store');

/* あとで使うかも
Route::post('messages', 'MessagesController@store');
Route::put('messages/{id}', 'MessagesController@update');
Route::delete('messages/{id}', 'MessagesController@destroy');

// index: showの補助ページ
Route::get('messages', 'MessagesController@index')->name('messages.index');
// create: 新規作成用のフォームページ
Route::get('messages/create', 'MessagesController@create')->name('messages.create');
// edit: 更新用のフォームページ
Route::get('messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
*/