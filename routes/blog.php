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
    Route::get('/blog/manager/index', 'Blog\IndexController@index');
    /**登录注册操作*/
    Route::any('/blog/manager/register', 'Blog\ManagerController@register');
    Route::any('/blog/manager/login', 'Blog\ManagerController@login');
    Route::get('/blog/manager/out', 'Blog\ManagerController@loginOut');

    Route::any('/blog/common/ajaxEditField', 'Blog\BaseController@ajaxEditField');

    Route::any('/blog/manager/loginOut', 'Blog\ManagerController@loginOut');

    Route::any('/blog/article/articles', 'Blog\ArticleController@articleList');
    Route::any('/blog/article/curdArticle', 'Blog\ArticleController@curdArticle');
    Route::any('/blog/article/remove', 'Blog\ArticleController@remove');
    /**文章分类*/
    Route::any('/blog/class/classList', 'Blog\ClassNameController@classList');
    Route::any('/blog/class/curdClass', 'Blog\ClassNameController@curdClass');
    Route::any('/blog/class/delClass', 'Blog\ClassNameController@delClass');
    /**配置管理*/
    Route::any('/blog/config/config', 'Blog\ConfigController@config');
    /**贡献者管理*/
    Route::any('/blog/stack/stack', 'Blog\StackController@stack');
    Route::any('/blog/stack/curdStack', 'Blog\StackController@curdStack');
    Route::any('/blog/stack/remove', 'Blog\StackController@remove');
});
