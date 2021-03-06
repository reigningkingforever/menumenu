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
Route::view('privacy','frontend.privacy')->name('privacy');
Route::get('menus','MenuController@index')->name('menus');
Route::get('menu/{menu}', 'MenuController@view')->name('menu.view');

Route::post('meals','MealController@index')->name('meals');
Route::get('meal/{meal}', 'MealController@view')->name('meal.view');


Route::get('blog','PostController@index')->name('blog');
Route::get('post/{post}', 'PostController@view')->name('post');

Route::get('cart','CartController@index')->name('cart');
Route::post('add-to-cart','CartController@addtocart')->name('cart.add');
Route::post('remove-from-cart','CartController@removefromcart')->name('cart.remove');
Route::post('applycoupon','CartController@applycoupon')->name('applycoupon');

Route::get('checkoutOrder/{order}','OrderController@checkout')->name('checkoutOrder');

Route::post('checkout','PaymentController@checkout')->name('checkout');

Route::get('paymentverification','PaymentController@verification')->name('paymentverify');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');
Route::get('home', 'HomeController@dashboard')->name('home');
include('user.php');
include('admin.php');


