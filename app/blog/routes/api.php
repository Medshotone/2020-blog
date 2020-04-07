<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/comments/category', 'CommentController@storeCategoryComments')->name('comment.category.store');
Route::get('/comments/category/{category}', 'CommentController@showCategoryComments')->name('comment.category.show');

Route::post('/comments/article', 'CommentController@storeArticleComments')->name('comment.article.store');
Route::get('/comments/article/{article}', 'CommentController@showArticleComments')->name('comment.article.show');
