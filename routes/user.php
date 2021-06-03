<?php

Route::group(['prefix'=>'user','as'=>'user.'],function(){
    Route::get('dashboard', 'HomeController@user')->name('home');
    Route::get('profile', 'UserController@index')->name('profile');
    Route::post('profile/update', 'UserController@update')->name('profile');
    Route::post('profile/preference', 'UserController@preference')->name('preference');

    Route::get('bookmark','UserController@bookmark')->name('bookmark');
    Route::post('bookmark/add','UserController@addToBookmark')->name('bookmark.add');
    Route::post('bookmark/remove','UserController@removeFromBookmark')->name('bookmark.remove');
    
    Route::get('transactions','UserController@transactions')->name('transactions');
    Route::get('order','OrderController@index')->name('orders');
    Route::get('order/view/{order}','OrderController@show')->name('order.show');
    Route::post('checkout','PaymentController@checkout')->name('checkout');
});