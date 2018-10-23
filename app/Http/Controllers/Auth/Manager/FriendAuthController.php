<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Manager;

class FriendAuthController extends BaseAuthController
{
    protected $rules = [
        'name' => 'required|uniqueCommon:friend_link',
    ];

    protected $message = [
        'required' => '请输入:attribute',
        'unique_common' => ':attribute已经存在',
    ];

    protected $customAttributes = [
        'name' => '名称',
    ];
}
