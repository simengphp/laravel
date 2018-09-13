<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/12
     * Time: 17:34
     */

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoTestController extends Controller
{
    public function test(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('img');
            $ret = UploadController::uploadMore($file);
        }
        return view('demo.demotest.test');
    }
}
