<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Blog;

class ArticleAuthController extends BaseAuthController
{
    protected $rules = [
        'title' => 'required|uniqueCommon:article',
        'content' => 'required|uniqueCommon:article',
        'desc' => 'required',
        'key' => 'required',
        'class_id' => 'required',
    ];

    protected $message = [
        'required' => '请输入:attribute',
        'unique_common' => ':attribute已经存在',
    ];

    protected $customAttributes = [
        'title' => '标题',
        'content' => '文章内容',
        'desc' => '文章描述',
        'key' => '关键词',
        'class_id' => '文章分类',
        'sort'      =>'排序'
    ];
}
