<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 17:59
     */

namespace App\Exceptions;

class BaseException extends \Exception
{
    public $message = '信息错误';

    public $code = '500';
}