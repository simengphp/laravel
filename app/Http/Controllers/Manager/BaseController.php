<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:13
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Model\Manager\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function ajaxEditField(Request $request)
    {
        $data = $request->post();
        $field = $data['field'];
        $value = $data['value'];
        $id = $data['id'];
        $table = $data['table'];
        try {
            $ret = (new Base())->editFieldBase($table, $id, $field, $value);
        } catch (\Exception $exception) {
            $ret = ['code'=>0];
        }
        if ($ret) {
            return ['code'=>1];
        } else {
            return ['code'=>0];
        }
    }
}
