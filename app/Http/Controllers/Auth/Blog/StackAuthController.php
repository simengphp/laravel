<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Blog;

class StackAuthController extends BaseAuthController
{
    protected $rules = [
        'name' => 'required|uniqueCommon:stack',
        'stack' => 'required|uniqueCommon:stack',
        'desc' => 'required',
    ];

    protected $message = [
        'required' => '请输入:attribute',
        'unique_common' => ':attribute已经存在',
    ];

    protected $customAttributes = [
        'name' => '名称',
        'stack' => '技术栈',
        'desc' => '简介',
    ];
}
