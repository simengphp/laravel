<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/12
     * Time: 17:34
     */

namespace App\Http\Controllers\Demo;

use App\Events\OrderShipped;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoTestController extends Controller
{
    public function test(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('img');
            $ret = UploadController::uploadMore($file);
            dd($ret);
        }
        return view('demo.demotest.test');
    }

    /**发送邮件*/
    public function sendMail()
    {
        event(new OrderShipped());
    }
}
