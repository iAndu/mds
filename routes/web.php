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

Route::get('/group-create', function () {
    return view('group-create');
});

Route::get('/task-create', function () {
    return view('task-create');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::resource('projects', 'ProjectsController');

});