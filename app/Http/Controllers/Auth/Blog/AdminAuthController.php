<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Blog;

class AdminAuthController extends BaseAuthController
{
    protected $rules = [
        'account'   =>'required|max:8|uniqueCommon:member',
        'password'  =>'required|min:6',
        'password_confirmation'=>'required|same:password'
    ];

    protected $message = [
        'required'   =>'请输入:attribute',
        'max'   =>'请输入少于8位:attribute',
        'min'   =>'请输入大于6位:attribute',
        'password_confirmation'=>'两次密码输入不相同',
        'same'=>'两次密码输入不匹配',
        'unique_common'=>'账号已经存在了'
    ];

    protected $customAttributes = [
        'account'   =>'账号',
        'password'  =>'密码',
        'password_confirmation'=>'确认密码'
    ];
}
