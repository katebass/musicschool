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

Route::get('/','GroupsController@index')->name('home');

Route::get('mygroups', 'GroupsController@myGroups')->name('mygroups');

Route::view('groups/new', 'groups.new')->name('creategroup');
Route::post('groups/create', 'GroupsController@create')->name("storegroup");

Route::get('/groups/join/{id}', 'GroupsController@join')->name('joingroup');
Route::get('/groups/leave/{id}', 'GroupsController@leave')->name('leavegroup');

Route::get('/groups/{id}', 'GroupsController@show')->name('group');
Route::get('/groups', 'GroupsController@search')->name('search');

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

 Route::view('signup', 'auth.registration')->name('signup');
 Route::post('register', 'AuthenticationController@register')->name('register');

 Route::view('/login', 'auth.signin')->name('login');
 Route::post('/login', 'AuthenticationController@login')->name('login-post');

 Route::get('/logout', 'AuthenticationController@destroy')->name('logout');
