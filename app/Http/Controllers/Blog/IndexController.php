<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Blog;

class IndexController extends BaseController
{
    public function index()
    {
        return view('blog.index.default', ['top_name'=>'首页','version'=>'1.0']);
    }
}
