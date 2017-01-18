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

Route::get('/', 'HomeController@index');
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@login');
});


Route::group(['namespace' => 'Project'], function () {
    Route::resource('project', 'ProjectController');
});
