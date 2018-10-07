<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:15
 */
Route::group(['middleware'=>'manager'], function () {
    Route::any('/manager/login', 'Manager\ManagerController@login');
    Route::any('/main/index', 'Manager\IndexController@index');
    Route::any('/manager/loginOut', 'Manager\ManagerController@loginOut');
});


Route::any('/manager/index', 'Manager\ManagerController@index');