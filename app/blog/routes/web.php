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

Route::get('/', 'CategoryController@categories')->name('categories');
Route::get('/category/{category}', 'CategoryController@category')->name('category');
Route::resource('/admin/category', 'CategoryController');

Route::get('/article', 'ArticleController@articles')->name('articles');
Route::get('/article/{article}', 'ArticleController@article')->name('article');
Route::resource('/admin/article', 'ArticleController');