<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:09
 */

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model
{
    public function editFieldBase($table, $id, $field, $val)
    {
        $ret = DB::table($table)->where('id', $id)->limit(1)->update([$field=>$val, 'updated_at'=>time()]);
        return $ret;
    }


    public function getUnique($model, $field, $class_name, $id = 0)
    {
        if ($id > 0) {
            return DB::table($model)
                ->where($field, $class_name)->where('deleted_at', null)->
                where('id', '<>', $id)->get();
        }
        return DB::table($model)
            ->where($field, $class_name)->where('deleted_at', null)->get();
    }

    public function getTime($time)
    {
        list($startTime, $endTime) = explode('-', $time);
        $startTime = strtotime($startTime);
        $endTime = strtotime(trim($endTime));
        $data['start'] = $startTime;
        $data['end'] = $endTime;
        //halt($data);
        return $data;
    }
}
