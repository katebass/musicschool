<?php

//main route
Route::get('/','GroupsController@index')->name('home');

//Authentication
Route::view('signup', 'auth.registration')->name('signup');
Route::post('register', 'AuthenticationController@register')->name('register');

Route::view('/login', 'auth.signin')->name('login');
Route::post('/login', 'AuthenticationController@login')->name('login-post');
Route::get('/logout', 'AuthenticationController@destroy')->name('logout');


//All about groups
Route::get('mygroups', 'GroupsController@myGroups')->name('mygroups');

Route::view('groups/new', 'groups.new')->name('creategroup');
Route::post('groups/create', 'GroupsController@create')->name("storegroup");
Route::get('/groups/delete/{id}', 'GroupsController@delete')->name('deletegroup');

Route::get('group/{id}/addtask', 'GroupsController@addTask')->name('addtask');
Route::post('group/{id}/addtaskpost', 'GroupsController@addTaskPost')->name('addtaskpost');


Route::get('/groups/join/{id}', 'GroupsController@join')->name('joingroup');
Route::get('/groups/leave/{id}', 'GroupsController@leave')->name('leavegroup');

Route::get('/groups/{id}', 'GroupsController@show')->name('group');
Route::get('/groups', 'GroupsController@search')->name('search');


//All about tasks
Route::get('mytasks', 'TasksController@myTasks')->name('mytasks');
Route::view('tasks/new', 'tasks.new')->name('createtask');
Route::post('tasks/create', 'TasksController@create')->name("storetask");