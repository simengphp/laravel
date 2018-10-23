<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\FriendAuthController;
use App\Model\Manager\ClassName;
use App\Model\Manager\FriendLink;
use Illuminate\Http\Request;

class FriendController extends BaseController
{
    protected $model_obj = null;
    public function __construct()
    {
        $this->model_obj = new FriendLink();
    }

    public function friendList(Request $request)
    {
        $list = $this->model_obj->friendList(5, $request);
        return view('manager.friend.friend', ['top_name'=>'友情链接','version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdFriend(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth = (new FriendAuthController())->goCheck($request);
            if ($auth) {
                return redirect()->back()->withErrors($auth)->withInput();
            }
            $data = $request->post();
            $ret = $this->model_obj->curdModel($request);
            if ($ret) {
                return redirect('friend/friendList')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            } else {
                return redirect('friend/friendList')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
            }
        } else {
            if ($request->get('id')) {
                $ret = $this->model_obj->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model_obj;
            }
            return view('manager.friend.curdFriend', ['top_name'=>'友情链接表单','version'=>'1.0','class_obj'=>new ClassName(),'ret'=>$ret]);
        }
    }

    /**删除方法
     * @author crazy
     */
    public function delFriend(Request $request)
    {
        $ret = $this->model_obj->delData($request->get('id'));
        if ($ret) {
            return redirect('friend/friendList')->with('success', '删除成功');
        } else {
            return redirect('friend/friendList')->with('error', '删除失败');
        }
    }
}
