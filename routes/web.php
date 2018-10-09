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
Route::get('/student/index', 'Demo\StudentController@index');



Route::group(['middleware'=>'web'], function () {
    Route::any('student/create', 'Demo\StudentController@create');
    Route::any('student/detail/{id}', 'Demo\StudentController@detail');
    Route::any('student/del/{id}', 'Demo\StudentController@del');
    Route::any('student/edit/{id}', 'Demo\StudentController@edit');
});

Route::any('demo/test', 'Demo\DemoTestController@test');
Route::any('demo/sendMail', 'Demo\DemoTestController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
