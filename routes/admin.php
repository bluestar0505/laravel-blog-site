<?php


Route::prefix('adminpanel')->middleware('auth')->group(function() {

    Route::get('/', 'AdminContrller@index')->name('admin');

    Route::get('/user', 'AdminContrller@user')->name('userlist_show');

    Route::get('/blog', 'AdminContrller@blog')->name('bloglist_show');

    Route::get('/comment', 'AdminContrller@comment')->name('commentlist_show');

    Route::delete('/{user}', 'AdminContrller@user_delete')->name('delete-user-admin');

    Route::delete('/blog/{blog}', 'AdminContrller@blog_delete')->name('delete-blog-admin');

    Route::delete('/comment/{comment}', 'AdminContrller@comment_delete')->name('delete-comment-admin');

});