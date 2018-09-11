<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 17:33
     */

namespace App\Exceptions;

use Exception;

class BaseException extends Handler
{
    public function report(Exception $exception)
    {

    }

    public function render($request, Exception $exception)
    {
        echo 111111;
        return 111;exit();
    }
}