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

Route::get('/', 'BlogController@index')->middleware('auth')->name('home');

Route::post('/comments/{blog_id}', 'CommentController@store')->name('store-comment');

Auth::routes();

Route::prefix('blogs')->middleware('auth')->group(function() {
    Route::get('/', 'BlogController@index')->name('blogs');

    Route::get('/create', 'BlogController@create')->name('create-blog');

    Route::post('/', 'BlogController@store')->name('store-blog');
    

    Route::get('/{blog}', 'BlogController@show')->name('show-blog');

    Route::get('/{blog}/edit', 'BlogController@edit')->name('edit-blog');

    Route::put('/{blog}', 'BlogController@update')->name('update-blog');

    Route::delete('/{blog}', 'BlogController@delete')->name('delete-blog');
});



Route::prefix('adminpanel')->middleware('auth')->group(function() {

    Route::get('/', 'AdminContrller@index')->name('admin');

    Route::get('/user', 'AdminContrller@user')->name('userlist_show');

    Route::get('/blog', 'AdminContrller@blog')->name('bloglist_show');

    Route::get('/comment', 'AdminContrller@comment')->name('commentlist_show');

    Route::delete('/{user}', 'AdminContrller@user_delete')->name('delete-user-admin');

    Route::delete('/blog/{blog}', 'AdminContrller@blog_delete')->name('delete-blog-admin');

    Route::delete('/comment/{comment}', 'AdminContrller@comment_delete')->name('delete-comment-admin');

});