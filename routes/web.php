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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/',      'LoginController@get_login')->name('home');
// Route::get('/login',    'LoginController@get_login')->name('login');
// Route::post('/login',   'Auth\LoginController@post_login')->name('login_post');

// Main route
// Auth::routes();

// Replacement routes for authentification
Route::get('/login',     'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login',    'Auth\LoginController@login')->name('login_post');
Route::post('/logout',   'Auth\LoginController@logout')->name('logout');
Route::get('/register',  'Auth\RegisterController@fakeRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@fakeregister')->name('register_post');
// Protection for real register
// Route::get('/register_real',  'Auth\RegisterController@showRegistrationForm')->name('register_confirm');
Route::post('/register_real',   'Auth\RegisterController@register')->name('register_confirm_post');

// Main Route After login - 
// Not yet executed: Check Auth type
Route::get('/dashboard',        'Dashboard\DashboardController@dashboard')->name('dashboard');
// Customer related:
Route::get('/customer',         'Customer\CustomerController@view')->name('customer.view');
Route::get('/add-customer',     'Customer\CustomerController@add')->name('customer.add');
Route::post('/add-customer',    'Customer\CustomerController@addPost')->name('customer.add.post');
Route::get('/sales',            'Customer\SalesController@view')->name('sales.view');
Route::get('/add-sales',        'Customer\SalesController@add')->name('sales.add');
Route::post('/add-sales',       'Customer\SalesController@addPost')->name('sales.add.post');

Route::get('/home', 'HomeController@index')->name('home');
