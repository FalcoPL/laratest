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

Route::get('/', 'PostsController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/posts', 'PostsController');


Route::get('admin', 'AdminController@index')->middleware('auth');

Route::get('/admin/listPosts', 'AdminController@listPosts')->middleware('auth');
Route::get('/admin/listDrafts', 'AdminController@listDrafts')->middleware('auth');

Route::resource('categories', 'CategoriesController');

Route::get('categories', function(){
	$categories = app('App\Http\Controllers\CategoriesController') -> index();
	return view('admin.categories', compact('categories'));
})->middleware('auth');
