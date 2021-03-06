<?php
Route::group(['prefix'=> 'admin','as'=>'admin.','middleware'=> ['auth','admin']],function(){
    Route::get('dashboard', 'HomeController@backend')->name('home');

    Route::get('tag','TagController@list')->name('tag.list');
    Route::post('tag/save','TagController@store')->name('tag.save');
    Route::get('tag/edit/{tag}','TagController@edit')->name('tag.edit');
    Route::post('tag/update/{tag}','TagController@update')->name('tag.update');
    Route::post('tag/delete/{tag}','TagController@destroy')->name('tag.delete');

    Route::get('meals','MealController@list')->name('meal.list');
    Route::get('meal/create','MealController@create')->name('meal.create');
    Route::post('meal/save','MealController@store')->name('meal.save');
    Route::get('meal/edit/{meal}','MealController@edit')->name('meal.edit');
    Route::post('meal/update/{meal}','MealController@update')->name('meal.update');
    Route::post('meal/duplicate/{meal}','MealController@duplicate')->name('meal.duplicate');
    Route::post('meal/delete/{meal}','MealController@destroy')->name('meal.delete');

    Route::get('meal/routine','RoutineController@index')->name('routine');
    Route::post('meal/routine-add','RoutineController@add')->name('routine.add');
    Route::post('meal/routine-update','RoutineController@update')->name('routine.update');
    Route::post('meal/routine-delete','RoutineController@delete')->name('routine.delete');

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


    Route::get('comments','CommentController@index')->name('comments');
    Route::post('comment/delete/{comment}','CommentController@destroy')->name('comment.delete');

    Route::get('messages','MessageController@index')->name('messages');
    Route::get('messages/create','MessageController@create')->name('messages.create');
    Route::post('messages/send','MessageController@store')->name('messages.store');

    Route::get('payment','PaymentController@list')->name('payment.list');
    Route::post('payment/delete/{payment}','PaymentController@destroy')->name('payment.delete');

    Route::get('users','UserController@list')->name('user.list');

    Route::get('coupons','CouponController@list')->name('coupon.list');
    Route::get('coupon/create','CouponController@create')->name('coupon.create');
    Route::post('coupon/save','CouponController@store')->name('coupon.save');
    Route::get('coupon/edit/{coupon}','CouponController@edit')->name('coupon.edit');
    Route::post('coupon/update/{coupon}','CouponController@update')->name('coupon.update');
    Route::post('coupon/delete','CouponController@destroy')->name('coupon.delete');

    Route::get('settings','SettingsController@list')->name('setting.list');
    Route::post('settings/state','SettingsController@state')->name('setting.state');
    Route::post('settings/cities','SettingsController@cities')->name('setting.cities');
    Route::post('settings/towns','SettingsController@towns')->name('setting.towns');
    Route::post('settings/notifications','SettingsController@notifications')->name('setting.notifications');
});