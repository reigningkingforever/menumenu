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
Route::post('add-to-cart','CartController@addtocart')->name('cart.add');
Route::post('remove-from-cart','CartController@removefromcart')->name('cart.remove');


Route::post('menus','MenuController@index')->name('menus');
Route::get('menu/{menu}', 'MenuController@view')->name('menu.view');
Route::post('menu/add-to-cart','MenuController@addtocart')->name('menu.addtocart');
Route::post('menu/remove-from-cart','MenuController@removefromcart')->name('menu.removefromcart');

Route::get('blog','PostController@index')->name('blog');
Route::get('post/{post}', 'PostController@view')->name('post');

Route::get('cart','PaymentController@cart')->name('cart');

Route::get('checkout','PaymentController@checkout')->name('checkout');

Auth::routes();
Route::get('home', 'HomeController@dashboard')->name('home');
include('user.php');
include('admin.php');


