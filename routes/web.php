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

Route::get('/',[
    'uses' => 'BlogController@index',
    'as' => 'blog'
    //return view('blog.index');
]);

Route::get('/blog/{post_id}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

//Route::resource('blog','BlogController');