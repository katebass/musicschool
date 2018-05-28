<?php
use Illuminate\Http\Request;

//main route
Route::get('/','GroupsController@index')->name('home');

//Authentication
Route::view('signup', 'auth.registration')->name('signup');
Route::post('register', 'AuthenticationController@register')->name('register');

Route::view('/login', 'auth.signin')->name('login');
Route::post('/login', 'AuthenticationController@login')->name('login-post');
Route::get('/logout', 'AuthenticationController@destroy')->name('logout');


//All about groups
Route::get('mygroups', 'GroupsController@myGroups')->name('mygroups')->middleware('authcheck');

Route::view('groups/new', 'groups.new')->name('creategroup')->middleware('authcheck');
Route::post('groups/create', 'GroupsController@create')->name("storegroup")->middleware('authcheck');
Route::get('/groups/delete/{id}', 'GroupsController@delete')->name('deletegroup')->middleware('authcheck');

Route::get('group/{id}/addtask', 'GroupsController@addTask')->name('addtask')->middleware('authcheck');
Route::post('group/{id}/addtaskpost', 'GroupsController@addTaskPost')->name('addtaskpost')->middleware('authcheck');


Route::get('/groups/join/{id}', 'GroupsController@join')->name('joingroup')->middleware('authcheck')->middleware('onlystudent');
Route::get('/groups/leave/{id}', 'GroupsController@leave')->name('leavegroup')->middleware('authcheck')->middleware('onlystudent');

Route::get('/groups/{id}', 'GroupsController@show')->name('group');
Route::get('/groups', 'GroupsController@search')->name('search');


//All about tasks
Route::get('mytasks', 'TasksController@myTasks')->name('mytasks')->middleware('authcheck');
Route::view('tasks/new', 'tasks.new')->name('createtask')->middleware('authcheck')->middleware('onlyteacher');
Route::post('tasks/create', 'TasksController@create')->name("storetask")->middleware('authcheck')->middleware('onlyteacher');

Route::get('/tasks/delete/{id}', 'TasksController@delete')->name('deletetask')->middleware('authcheck')->middleware('onlyteacher');

Route::get('/tasks/{id}', 'TasksController@show')->name('task')->middleware('authcheck');
Route::post('/tasks/{id}/getaudio', 'TasksController@getAudio')->name('getTaskFile')->middleware('authcheck');

//All about solutions
Route::get('mysolutions', 'SolutionsController@mySolutions')->name('mysolutions')->middleware('authcheck');

Route::get('tasks/{id}/newsolution', 'SolutionsController@newSolution')->name('createsolution')->middleware('authcheck')->middleware('onlystudent');
Route::post('tasks/{id}/createsolution', 'SolutionsController@create')->name("storesolution")->middleware('authcheck')->middleware('onlystudent');

Route::post('solutions/{id}/updatemark', 'SolutionsController@updatemark')->name('updatemark')->middleware('authcheck')->middleware('onlyteacher');
Route::post('/solutions/{id}/getaudio', 'SolutionsController@getAudio')->name('getSolutionFile')->middleware('authcheck');