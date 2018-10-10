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

    public function classList()
    {
        $list = $this->model_obj->classList(5);
        return view('manager.class.className', ['top_name'=>'文章分类列表','version'=>'1.0','list'=>$list]);
    }

    public function curdClass(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth = (new ClassAuthController())->goCheck($request);
            if ($auth) {
                return redirect()->back()->withErrors($auth)->withInput();
            }
            $ret = $this->model_obj->curdModel($request);
            dd($ret);
        } else {
            if ($request->get('id')) {
                $ret = $this->model_obj->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model_obj;
            }
            return view('manager.class.curdClass', ['top_name'=>'文章分类表单','version'=>'1.0','ret'=>$ret]);
        }
    }

    /**删除方法
     * @author crazy
     */
    public function delClass(Request $request)
    {
        $student = $this->model_obj->getOneDetail($request->get('id'));
        if ($student->delete()) {
            return redirect('class/classList')->with('success', '删除成功');
        } else {
            return redirect('class/classList')->with('error', '删除失败');
        }
    }
}
