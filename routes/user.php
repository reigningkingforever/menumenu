<?php

Route::group(['prefix'=>'user','as'=>'user.','middleware'=> 'auth'],function(){
    Route::get('dashboard', 'HomeController@user')->name('home');
    // Route::get('profile', 'UserController@index')->name('profile');
    Route::post('profile/update', 'UserController@profile')->name('profile');
    Route::post('profile/password', 'UserController@password')->name('password');
    Route::post('profile/address', 'UserController@addresses')->name('address');

    Route::get('bookmark','CartController@bookmark')->name('bookmark');
    Route::post('bookmark/add','CartController@addToBookmark')->name('bookmark.add');
    Route::post('bookmark/remove','CartController@removeFromBookmark')->name('bookmark.remove');
    
    Route::get('transactions','UserController@transactions')->name('transactions');
    Route::get('order','OrderController@index')->name('orders');
    Route::get('order/view/{order}','OrderController@show')->name('order.show');
    Route::post('order/delete/{order}','OrderController@delete')->name('order.delete');
});