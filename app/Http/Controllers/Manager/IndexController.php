<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

class IndexController extends BaseController
{
    public function index()
    {
        $html = '<div>121212</div>';
        return view('manager.index.default', ['top_name'=>'首页','version'=>'1.0',
            'default_view'=>$html]);
    }
}
