<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/12
     * Time: 9:03
     */

namespace App\Exceptions;

use Throwable;

class StudentException extends BaseException
{
    public function __construct(string $message = "暂无信息", int $code = 404, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
