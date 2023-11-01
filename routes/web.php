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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::get('/', 'Auth\LoginController@login');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('post/create' , 'PostsController@create');

//ログイン中のページ
Route::get('/top', 'PostsController@index');

Route::get('/profile', 'PostsController@profile');

Route::get('/search', 'UsersController@search');

Route::get('/add-follow', 'FollowsController@addFollow');
Route::get('/un-follow', 'FollowsController@unFollow');

Route::get('/followList', 'FollowsController@followList');

Route::get('/followerList' ,'PostsController@followerList');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/create{id}/', 'PostsController@create');

Route::get('/post/{id}/delete', 'PostsController@delete');

Route::get('/result', 'UsersController@result');

Route::post('post/update', 'PostsController@update');

Route::post('user/update', 'UsersController@update');

Route::get('/follow-profile','UsersController@profile');
