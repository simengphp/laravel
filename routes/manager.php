<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:15
 */
Route::group(['middleware'=>'manager'], function () {
    Route::any('/common/ajaxEditField', 'Manager\BaseController@ajaxEditField');

    Route::any('/manager/login', 'Manager\ManagerController@login');
    Route::any('/main/index', 'Manager\IndexController@index');
    Route::any('/manager/loginOut', 'Manager\ManagerController@loginOut');

    Route::any('/article/articles', 'Manager\ArticleController@articleList');
    Route::any('/article/curdArticle', 'Manager\ArticleController@curdArticle');
    Route::any('/article/remove', 'Manager\ArticleController@remove');
    /**文章分类*/
    Route::any('/class/classList', 'Manager\ClassNameController@classList');
    Route::any('/class/curdClass', 'Manager\ClassNameController@curdClass');
    Route::any('/class/delClass', 'Manager\ClassNameController@delClass');
    /**配置管理*/
    Route::any('/config/config', 'Manager\ConfigController@config');
    /**贡献者管理*/
    Route::any('/stack/stack', 'Manager\StackController@stack');
    Route::any('/stack/curdStack', 'Manager\StackController@curdStack');
    Route::any('/stack/remove', 'Manager\StackController@remove');
});
