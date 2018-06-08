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
        $group_id = Auth::user()->groups()->first();
        return view('index', compact('group_id'));
    });

    Route::resource('{group_id}/projects', 'ProjectsController');
    Route::post('{group_id}/projects/assign', ['as'=>'projects.assign', 'uses'=>'ProjectsController@assign']);
    Route::get('{group_id}/groups/change', ['as' => 'groups.change', 'uses' => 'GroupsController@change']);
    Route::post('{group_id}/groups/changed', ['as' => 'groups.changed', 'uses' => 'GroupsController@changed']);
    Route::resource('{group_id}/groups', 'GroupsController');
    Route::get('{group_id}/tasks/all', ['as'=>'tasks.all', 'uses'=>'TasksController@all']);
    Route::post('{group_id}/tasks/assign', ['as'=>'tasks.assign', 'uses'=>'TasksController@assign']);
    Route::post('{group_id}/tasks/changePriority', ['as'=>'tasks.changePriority', 'uses'=>'TasksController@changePriority']);
    Route::post('{group_id}/tasks/toggleSubtask', ['as'=>'tasks.toggleSubtask', 'uses'=>'TasksController@toggleSubtask']);
    Route::resource('{group_id}/tasks', 'TasksController');
    Route::resource('{group_id}/comments', 'CommentsController');
    Route::get('{group}/chat/{user?}', ['as' => 'chat.index', 'uses' => 'ChatController@index']);
    Route::post('chat/send', ['as' => 'chat.send', 'uses' => 'ChatController@send']);
    Route::get('chat/get', ['as' => 'chat.get', 'uses' => 'ChatController@get']);
});
