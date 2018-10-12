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

    Route::any('/common/ajaxEditField', 'Blog\BaseController@ajaxEditField');

    Route::any('/blog/loginOut', 'Blog\ManagerController@loginOut');

    Route::any('/article/articles', 'Blog\ArticleController@articleList');
    Route::any('/article/curdArticle', 'Blog\ArticleController@curdArticle');
    Route::any('/article/remove', 'Blog\ArticleController@remove');
    /**文章分类*/
    Route::any('/class/classList', 'Blog\ClassNameController@classList');
    Route::any('/class/curdClass', 'Blog\ClassNameController@curdClass');
    Route::any('/class/delClass', 'Blog\ClassNameController@delClass');
    /**配置管理*/
    Route::any('/config/config', 'Blog\ConfigController@config');
    /**贡献者管理*/
    Route::any('/stack/stack', 'Blog\StackController@stack');
    Route::any('/stack/curdStack', 'Blog\StackController@curdStack');
    Route::any('/stack/remove', 'Blog\StackController@remove');
});
