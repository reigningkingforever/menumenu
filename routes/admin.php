<?php
Route::group(['prefix'=> 'admin','as'=>'admin.'],function(){
    Route::get('dashboard', 'HomeController@backend')->name('home');

    Route::get('menu','MenuController@list')->name('menu.list');
    Route::post('menu/save','MenuController@store')->name('menu.save');
    Route::get('menu/edit/{menu}','MenuController@edit')->name('menu.edit');
    Route::post('menu/update','MenuController@update')->name('menu.update');
    Route::post('menu/delete/{menu}','MenuController@destroy')->name('menu.delete');

    Route::get('meals','MealController@list')->name('meal.list');
    Route::get('meal/create','MealController@create')->name('meal.create');
    Route::post('meal/save','MealController@store')->name('meal.save');
    Route::get('meal/edit/{meal}','MealController@edit')->name('meal.edit');
    Route::post('meal/update/{meal}','MealController@update')->name('meal.update');
    Route::post('meal/duplicate/{meal}','MealController@duplicate')->name('meal.duplicate');
    Route::post('meal/delete/{meal}','MealController@destroy')->name('meal.delete');

    Route::get('orders','OrderController@list')->name('order.list');
    Route::get('order/view/{order}','OrderController@view')->name('order.view');
    Route::post('order/status','OrderController@status')->name('order.status');
    Route::post('order/modify/{order}','OrderController@modify')->name('order.modify');
    Route::post('order/delete/{order}','OrderController@destroy')->name('order.delete');
    Route::post('order/purchase','OrderController@purchase')->name('order.purchase');
    Route::post('order/ready','OrderController@ready')->name('order.ready');
    

    Route::get('purchases','PurchaseController@list')->name('purchase.list');
    Route::get('purchase/view/{order}','PurchaseController@view')->name('purchase.view');
    Route::post('purchase/status','PurchaseController@create')->name('purchase.status');
    Route::post('purchase/purchase','PurchaseController@purchase')->name('purchase.purchase');
    Route::post('purchase/update/{purchase}','PurchaseController@update')->name('purchase.update');
    Route::post('purchase/duplicate/{purchase}','PurchaseController@duplicate')->name('purchase.duplicate');
    Route::post('purchase/delete/{purchase}','PurchaseController@destroy')->name('purchase.delete');

    Route::get('posts','PostController@list')->name('post.list');
    Route::get('posts/create','PostController@create')->name('post.create');
    Route::post('posts/save','PostController@store')->name('post.save');
    Route::get('posts/edit/{post}','PostController@edit')->name('post.edit');
    Route::post('posts/update/{post}','PostController@update')->name('post.update');
    Route::post('posts/duplicate/{post}','PostController@duplicate')->name('post.duplicate');
    Route::post('posts/delete/{post}','PostController@destroy')->name('post.delete');


    Route::get('reviews/','ReviewController@list')->name('review.list');
    Route::post('review/delete/{comment}','ReviewController@destroy')->name('review.delete');

    Route::get('payment','PaymentController@list')->name('payment.list');
    Route::post('payment/delete/{payment}','PaymentController@destroy')->name('payment.delete');

    

    

    Route::get('users','UserController@list')->name('user.list');
});