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

Route::middleware(['auth'])->group(function () {
    Route::get('/posts','postsController@index')->name('posts.index');
    Route::get('/posts/create','postsController@create')->name('posts.create');


    Route::post('/posts','postsController@store')->name('posts.store');

    Route::get('/posts/{post}','postsController@show')->name('posts.show');

    Route::get('/posts/{post}/edit','postsController@edit')->name('posts.edit');

    Route::PUT('/posts/{post}','postsController@update')->name('posts.update');

    Route::DELETE('/posts/{post}','postsController@destroy')->name('posts.destroy');
});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
