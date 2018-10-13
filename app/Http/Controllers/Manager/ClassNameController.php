<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\ClassAuthController;
use App\Model\Manager\ClassName;
use Illuminate\Http\Request;

class ClassNameController extends BaseController
{
    protected $model_obj = null;
    public function __construct()
    {
        $this->model_obj = new ClassName();
    }

    public function classList(Request $request)
    {
        $list = $this->model_obj->classList(5, $request);
        return view('manager.class.className', ['top_name'=>'文章分类列表','version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdClass(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth = (new ClassAuthController())->goCheck($request);
            if ($auth) {
                return redirect()->back()->withErrors($auth)->withInput();
            }
            $data = $request->post();
            $ret = $this->model_obj->curdModel($request);
            if ($ret) {
                return redirect('class/classList')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            } else {
                return redirect('class/classList')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
            }
        } else {
            if ($request->get('id')) {
                $ret = $this->model_obj->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model_obj;
            }
            return view('manager.class.curdClass', ['top_name'=>'文章分类表单','version'=>'1.0','class_obj'=>new ClassName(),'ret'=>$ret]);
        }
    }

    /**删除方法
     * @author crazy
     */
    public function delClass(Request $request)
    {
        $ret = $this->model_obj->delData($request->get('id'));
        if ($ret) {
            return redirect('class/classList')->with('success', '删除成功');
        } else {
            return redirect('class/classList')->with('error', '删除失败');
        }
    }
}
