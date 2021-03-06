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
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('decompose', '\Lubusin\Decomposer\Controllers\DecomposerController@index');
    Route::resource('regions', 'RegionController');
    Route::resource('users', 'UserController');
    Route::resource('schools', 'SchoolController');
    Route::resource('teachers', 'TeacherController');
    Route::get('school/{school}', 'SchoolController@main')->middleware('can:view,school');
    //MoreRoute
});
