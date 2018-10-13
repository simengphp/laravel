<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/9
     * Time: 17:43
     */

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Auth\Blog\StackAuthController;
use App\Model\Blog\ClassName;
use App\Model\Blog\Stack;
use Illuminate\Http\Request;

class StackController extends BaseController
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new Stack();
    }

    public function stack(Request $request)
    {
        $data = $request->all();
        $list=$this->model->modelList(5, $data);
        return view('blog.stack.stackList', ['top_name'=>'贡献者', 'version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdStack(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth_ret = (new StackAuthController())->goCheck($request);
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
            $data['sort'] = $data['sort']??0;
            $ret = $this->model->curdModel($data);
            if ($ret) {
                return redirect('blog/stack/stack')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            }
            return redirect('blog/stack/stack')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
        } else {
            if ($request->get('id')) {
                $ret = $this->model->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model;
            }
            $ret['class_list'] = (new ClassName())->classList(20, $request);
            return view('blog.stack.curdStack', ['top_name'=>'贡献者', 'version'=>'1.0',
                'ret'=>$ret]);
        }
    }

    public function remove(Request $request)
    {
        $ret = $this->model->delData($request->get('id'));
        if ($ret) {
            return redirect('blog/stack/stack')->with('success', '删除成功');
        } else {
            return redirect('blog/stack/stack')->with('error', '删除失败');
        }
    }
}
