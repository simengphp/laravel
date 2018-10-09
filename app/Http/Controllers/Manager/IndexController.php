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
        return view('manager.index.index');
    }
}
