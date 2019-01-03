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

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.check'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as' => 'category'
]);

Route::get('/author/{author}',[
   'uses' => 'BlogController@author',
   'as' => 'author'
]);



//Route::resource('blog','BlogController');
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::resource('/backend/blog','Backend\BlogController');

Route::resource('/backend/categories','Backend\CategoriesController');

Route::resource('/backend/users','Backend\UsersController');


Route::put('/backend/blog/{blog}/restore',[
    'uses' => 'Backend\BlogController@restore',
    'as' => 'blog.restore',

]);

Route::delete('/backend/blog/{blog}/force-destroy',[
    'uses' => 'Backend\BlogController@forceDestroy',
    'as' => 'blog.force-destroy',

]);

Route::get('/backend/users/{user}/confirm',[
    'uses' => 'Backend\UsersController@confirm',
    'as' => 'users.confirm'
]);