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

Route::get(/**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
    '/', function () {
    return view('auth.login');
});

Auth::routes();

//記事一覧
Route::get('/home', 'HomeController@index');

//記事
Route::get('/{post}show', 'PostsController@showPost');

//記事編集
Route::get('/{post}edit', 'PostsController@editPost');
Route::post('/{post}update', 'PostsController@updatePost');

//記事削除
Route::get('/post/{post}/delete', 'PostsController@deletePost');

//記事新規投稿
Route::get('/new', 'PostsController@newPost');
Route::post('/save', 'PostsController@savePost');
