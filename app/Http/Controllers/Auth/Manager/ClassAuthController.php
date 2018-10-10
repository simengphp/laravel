<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Manager;

class AdminAuthController extends BaseAuthController
{
    protected $rules = [
        'account'   =>'required|max:8',
        'password'  =>'required',
    ];

    protected $message = [
        'required'   =>'请输入:attribute',
        'max'   =>'请输入少于8位:attribute',
    ];

    protected $customAttributes = [
        'account'   =>'账号',
        'password'  =>'密码'
    ];
}