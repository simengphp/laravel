<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:10
 */

namespace App\Model\Manager;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin extends Base
{
    protected $table = 'admin';
    protected $table_obj = null;
    public function __construct(array $attributes = [])
    {
        $this->table_obj = DB::table('admin');
        parent::__construct($attributes);
    }

    public function getOneAdmin(Request $request)
    {
        $ret = $this->table_obj->where('account', $request->post('account'))->first();
        if (empty($ret)) {
            return ['code'=>0,'error'=>'账号不存在'];
        }
        $ret = $this->table_obj->where([['account', $request->post('account')],['password', $request->post('password')]])->first();
        if (empty($ret)) {
            return ['code'=>0,'error'=>'密码错误'];
        }
        $this->table_obj->where([['account', $request->post('account')],['password', $request->
        post('password')]])->limit(1)->update(['last_login_time'=>time()]);
        Session::put('admin_id', $ret->id);
        Session::put('admin_name', $ret->name);
        Session::put('admin_account', $ret->account);
        Session::put('admin_pic', $ret->pic);
        Session::put('last_login_time', date('Y-m-d H:i:s', $ret->last_login_time));
        return ['code'=>1,'ret'=>$ret];
    }
}
