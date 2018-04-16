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

Route::get('/group-create', function () {
    return view('group-create');
});

Route::get('/project-create', function () {
    return view('project-create');
});

Route::get('/task-create', function () {
    return view('task-create');
});

Route::get('/project-list', function () {
    return view('project-list');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
