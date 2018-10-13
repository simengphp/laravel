<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/9
     * Time: 17:43
     */

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Auth\Blog\ArticleAuthController;
use App\Model\Blog\Article;
use App\Model\Blog\ClassName;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new Article();
    }

    public function articleList(Request $request)
    {
        $data = $request->all();
        $list=$this->model->articleList(5, $data);
        return view('blog.article.articleList', ['top_name'=>'文章', 'version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdArticle(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth_ret = (new ArticleAuthController())->goCheck($request);
            if ($auth_ret) {
                return redirect()->back()->withErrors($auth_ret)->withInput();
            }
            $data = $request->post();
            $file_img = $this->common($request, 'pic'); //上传图片
            if (isset($file_img['flag']) && $file_img['flag'] === false) {
                return redirect()->back()->withErrors($file_img['msg'])->withInput();
            }
            $pic = isset($data['pic'])?$data['pic']:'';
            $data['pic'] = $file_img?$file_img:$pic;
            $data['author'] = $data['author']??'admin';
            $ret = $this->model->curdArticle($data);
            if ($ret) {
                return redirect('blog/article/articles')->
                with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            }
            return redirect('blog/article/articles')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
        } else {
            if ($request->get('id')) {
                $ret = $this->model->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model;
            }
            $ret['class_list'] = (new ClassName())->classList(20, $request);
            return view('blog.article.curdArticle', ['top_name'=>'文章', 'version'=>'1.0',
                'ret'=>$ret]);
        }
    }

    public function remove(Request $request)
    {
        $ret = $this->model->delData($request->get('id'));
        if ($ret) {
            return redirect('blog/article/articles')->with('success', '删除成功');
        } else {
            return redirect('blog/article/articles')->with('error', '删除失败');
        }
    }
}
