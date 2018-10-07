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
            } else {
                dd($this->admin_obj->getOneAdmin($request));
            }
        } else {
            return view('Manager.Manager.login');
        }
    }

    public function index(Request $request)
    {

    }
}