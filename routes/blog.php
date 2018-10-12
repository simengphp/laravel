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
Route::group(['middleware'=>'blog'], function () {
    Route::get('/blog/index', 'Blog\IndexController@index');
    /**登录注册操作*/
    Route::any('/blog/register', 'Blog\ManagerController@register');
    Route::any('/blog/login', 'Blog\ManagerController@login');
    Route::get('/blog/out', 'Blog\ManagerController@loginOut');
});
