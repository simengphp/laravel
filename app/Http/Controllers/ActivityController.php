<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 9:42
     */

namespace App\Http\Controllers;

class ActivityController extends Controller
{
    public function activityStart()
    {
        echo '活动即将开始';
    }

    public function activityMiddle()
    {
        echo '活动进行中';
    }

}