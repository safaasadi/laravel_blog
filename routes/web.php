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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-post', 'PostController@createPost');

Route::post('/delete-post', 'PostController@deletePost');

Route::get('/edit-post', 'PostController@getEdit');

Route::get('/post', 'PostController@getPost');

Route::post('/update-post', 'PostController@updatePost');
