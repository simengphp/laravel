<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 12:50
 */

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Auth\Blog\AdminAuthController;
use App\Http\Controllers\Auth\Blog\LoginAuthController;
use App\Model\Blog\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagerController extends BaseController
{

    private $admin_obj = null;
    public function __construct()
    {
        $this->admin_obj = new Admin();
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $admin_auth = (new AdminAuthController())->goCheck($request);
            if ($admin_auth) {
                return redirect()->back()->withErrors($admin_auth)->withInput();
            }
            $data = $request->post();
            if ($this->admin_obj->registerMember($data)) {
                return redirect('blog/manager/index')->with('success', '注册成功');
            }
            return redirect('blog/manager/index')->with('success', '注册失败');
        }
        return view('blog.manager.register');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $admin_auth = (new LoginAuthController())->goCheck($request);
            if ($admin_auth) {
                return redirect()->back()->withErrors($admin_auth)->withInput();
            }
            /**获取账号和密码*/
            $ret = $this->admin_obj->getOneMember($request);
            if ($ret['code'] == 0) {
                return redirect()->back()->with('error', $ret['error'])->withInput();
            }
            return redirect('blog/manager/index');
        } else {
            return view('blog.manager.login');
        }
    }

    public function loginOut()
    {
        Session::flush();
        return redirect('blog/manager/login');
    }

}