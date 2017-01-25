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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@attempt');
    Route::get('logout', 'LoginController@logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
});
Route::group(['namespace' => 'Project', 'middleware' => 'auth'], function () {
    Route::delete('project/selected/delete', 'ProjectController@selectedDelete');
    Route::resource('project', 'ProjectController');
});
