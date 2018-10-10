<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:09
 */

namespace App\Model\Manager;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model
{
    public function editFieldBase($table, $id, $field, $val)
    {
        $ret = DB::table($table)->where('id', $id)->limit(1)->update([$field=>$val, 'updated_at'=>time()]);
        return $ret;
    }
}
