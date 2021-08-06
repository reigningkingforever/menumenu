<?php

Route::group(['prefix'=>'user','as'=>'user.','middleware'=> 'auth'],function(){
    Route::get('dashboard', 'HomeController@user')->name('home');

    Route::get('profile', 'UserController@index')->name('profile');
    Route::post('profile/update', 'UserController@profile')->name('profile.save');
    
    Route::get('profile/settings', 'UserController@settings')->name('settings');
    Route::post('profile/preferences', 'UserController@preferences')->name('settings.save');
    Route::post('profile/password', 'UserController@password')->name('password');
    Route::post('profile/address', 'UserController@addresses')->name('address');

    Route::post('bookmark/add','CartController@addToBookmark')->name('bookmark.add');
    Route::post('bookmark/remove','CartController@removeFromBookmark')->name('bookmark.remove');
    
    Route::get('transactions','PaymentController@userTransactions')->name('transactions');

    Route::get('orders','OrderController@index')->name('orders');
    Route::get('order/view/{order}','OrderController@show')->name('order.show');
    Route::post('order/delete/{order}','OrderController@delete')->name('order.delete');

    Route::post('comment', 'CommentController@store')->name('comment');
});