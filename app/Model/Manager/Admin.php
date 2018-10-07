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
        session('admin_id', $ret->id);
        session('admin_name', $ret->name);
        session('admin_account', $ret->account);
        return ['code'=>1,'ret'=>$ret];
    }
}