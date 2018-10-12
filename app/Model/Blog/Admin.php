<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:10
 */

namespace App\Model\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin extends Base
{
    protected $table = 'member';
    protected $table_obj = null;
    protected $fillable = ['name','account','password'];
    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getFromatTime();
    }
    public function getFromatTime()
    {
        return time();
    }
    public function __construct(array $attributes = [])
    {
        $this->table_obj = DB::table('member');
        parent::__construct($attributes);
    }

    public function getOneMember(Request $request)
    {
        $ret = $this->table_obj->where('account', $request->post('account'))->first();
        if (empty($ret)) {
            return ['code'=>0,'error'=>'账号不存在'];
        }
        $ret = $this->table_obj->where([['account', $request->post('account')],
            ['password', $request->post('password')]])->first();
        if (empty($ret)) {
            return ['code'=>0,'error'=>'密码错误'];
        }
        $this->table_obj->where([['account', $request->post('account')],['password', $request->
        post('password')]])->limit(1)->update(['last_login_time'=>time()]);
        Session::put('blog_id', $ret->id);
        Session::put('blog_name', $ret->name);
        Session::put('blog_account', $ret->account);
        Session::put('blog_pic', $ret->pic);
        Session::put('last_login_time', date('Y-m-d H:i:s', $ret->last_login_time));
        return ['code'=>1,'ret'=>$ret];
    }

    public function registerMember($data)
    {
        return Admin::create($data);
    }
}
