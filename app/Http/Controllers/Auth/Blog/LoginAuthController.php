<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Blog;

class LoginAuthController extends BaseAuthController
{
    protected $rules = [
        'account'   =>'required|max:8',
        'password'  =>'required|min:6',
    ];

    protected $message = [
        'required'   =>'请输入:attribute',
        'max'   =>'请输入少于8位:attribute',
        'min'   =>'请输入大于6位:attribute',
    ];

    protected $customAttributes = [
        'account'   =>'账号',
        'password'  =>'密码',
    ];
}
