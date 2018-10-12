<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Blog;

class ClassAuthController extends BaseAuthController
{
    protected $rules = [
        'class_name' => 'required|uniqueCommon:class',
        'sort'      =>'required'
    ];

    protected $message = [
        'required' => '请输入:attribute',
        'unique_common' => ':attribute已经存在',
    ];

    protected $customAttributes = [
        'class_name' => '分类名称',
        'sort'      =>'排序'
    ];
}
