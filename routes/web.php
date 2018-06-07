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

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::resource('projects', 'ProjectsController');
    Route::resource('groups', 'GroupsController');    
    Route::get('/tasks/all', ['as'=>'tasks.all', 'uses'=>'TasksController@all']);
    Route::post('/tasks/assign', ['as'=>'tasks.assign', 'uses'=>'TasksController@assign']);
    Route::post('/tasks/changePriority', ['as'=>'tasks.changePriority', 'uses'=>'TasksController@changePriority']);
    Route::post('/tasks/toggleSubtask', ['as'=>'tasks.toggleSubtask', 'uses'=>'TasksController@toggleSubtask']);
    Route::resource('tasks', 'TasksController');
    Route::resource('comments', 'CommentsController');
    Route::get('{group}/chat/{user?}', ['as' => 'chat.index', 'uses' => 'ChatController@index']);
    Route::post('chat/send', ['as' => 'chat.send', 'uses' => 'ChatController@send']);
    Route::get('chat/get', ['as' => 'chat.get', 'uses' => 'ChatController@get']);
});
