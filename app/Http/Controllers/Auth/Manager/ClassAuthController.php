<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Manager;

class ClassAuthController extends BaseAuthController
{
    protected $rules = [
        'class_name' => 'required|uniqueCommon:id',
        'sort'      =>'required'
    ];

    protected $message = [
        'required' => '请输入:attribute',
    ];

    protected $customAttributes = [
        'class_name' => '分类名称',
        'sort'      =>'排序'
    ];
}
