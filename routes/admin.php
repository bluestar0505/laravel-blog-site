<?php


Route::prefix('adminpanel')->middleware('auth')->group(function() {

    Route::get('/', 'AdminContrller@index')->name('admin');

    Route::get('/user', 'AdminContrller@user')->name('userlist-show');

    Route::get('/blog', 'AdminContrller@blog')->name('bloglist-show');

    Route::get('/comment', 'AdminContrller@comment')->name('commentlist-show');

    Route::delete('/{user}', 'AdminContrller@userDelete')->name('delete-user-admin');

    Route::delete('/blog/{blog}', 'AdminContrller@blogDelete')->name('delete-blog-admin');

    Route::delete('/comment/{comment}', 'AdminContrller@commentDelete')->name('delete-comment-admin');

});