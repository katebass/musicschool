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
})->name('home');

 Route::view('signup', 'auth.registration')->name('signup');
 Route::post('register', 'AuthenticationController@register')->name('register');

 Route::view('/login', 'auth.signin')->name('login');
 Route::post('/login', 'AuthenticationController@login')->name('login-post');

 Route::get('/logout', 'AuthenticationController@destroy')->name('logout');