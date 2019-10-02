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
    return view('index');
});

Route::get('index', 'IndexController@showIndex')->name('home');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('users', 'UserController');

    Route::name('users.create')->get('users', 'layouts\UserController@create');
    Route::name('users.store')->post('users', 'layouts\UserController@store');

Route::resource('annonces','AnnonceController');