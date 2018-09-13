<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/13
     * Time: 17:31
     */

namespace App\Http\Controllers\Auth\Demo;

class StudentAuthController extends BaseAuthController
{
    protected $rules = [
        'student.name'  =>'required',
        'student.age'   =>'required|integer',
        'student.sex'   =>'required|integer',
    ];
    protected $message = [
        'required'   =>':attribute 为必填项',
        'integer'   =>':attribute 必须为整数',
    ];

    protected $customAttributes = [
        'student.name'=>'姓名',
        'student.age'=>'年龄',
        'student.sex'=>'性别',
    ];

}
