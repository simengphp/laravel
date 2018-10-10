<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 12:50
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\AdminAuthController;
use App\Model\Manager\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagerController extends BaseController
{

    private $admin_obj = null;
    public function __construct()
    {
        $this->admin_obj = new Admin();
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $admin_auth = (new AdminAuthController())->goCheck($request);
            if ($admin_auth) {
                return redirect()->back()->withErrors($admin_auth)->withInput();
            }
            /**获取账号和密码*/
            $ret = $this->admin_obj->getOneAdmin($request);
            if ($ret['code'] == 0) {
                return redirect()->back()->with('error', $ret['error'])->withInput();
            }
            return redirect('main/index');
        } else {
            return view('manager.manager.login');
        }
    }

    public function loginOut()
    {
        Session::flush();
        return redirect('manager/login');
    }

}