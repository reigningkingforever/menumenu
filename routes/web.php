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

Route::get('/', 'HomeController@front');

Route::view('home-cooking-delivery','frontend.homecooking')->name('home-cooking');
Route::view('cake-and-pastries','frontend.pastries')->name('cake-pastries');
Route::view('foodstuff-purchase','frontend.foodstuff')->name('foodstuff-purchase');
Route::view('event-catering','frontend.catering')->name('catering');
Route::view('training','frontend.training')->name('training');
Route::get('meals','MealController@index')->name('meals');
Route::get('meal/{meal}', 'MealController@view')->name('meal.view');
Route::post('menus','MenuController@index')->name('menus');
Route::get('menu/{menu}', 'MenuController@view')->name('menu.view');    




Route::get('blog','PostController@index')->name('blog');
Route::get('post/{post}', 'PostController@view')->name('post');

Route::get('cart','MenuController@cart')->name('cart');

Auth::routes();
Route::get('home', 'HomeController@dashboard')->name('home');
Route::group(['prefix'=>'user','as'=>'user.'],function(){
    Route::get('dashboard', 'HomeController@user')->name('home');
    Route::get('profile', 'UserController@index')->name('profile');
    Route::post('profile/update', 'UserController@update')->name('profile');
    Route::post('profile/preference', 'UserController@preference')->name('preference');
    Route::get('meal-plan','UserController@mealplan')->name('orders');
    Route::get('saves','UserController@savedMeals')->name('saved.meals');
    Route::get('transactions','UserController@transactions')->name('transactions');
    Route::get('order','OrderController@index')->name('orders');
    Route::get('order/view/{order}','OrderController@show')->name('order.show');
    Route::post('checkout','PaymentController@checkout')->name('checkout');
});
include('admin.php');


