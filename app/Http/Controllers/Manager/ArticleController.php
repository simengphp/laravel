<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/9
     * Time: 17:43
     */

namespace App\Http\Controllers\Manager;

class ArticleController extends BaseController
{
    public function articleList()
    {
        return view('manager.article.articleList');
    }
}
