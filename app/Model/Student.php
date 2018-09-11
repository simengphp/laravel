<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 15:11
     */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = ['name', 'age', 'sex'];
//    public static function getData()
//    {
//        //$ret = DB::select('select * from db_student');
//        $ret = DB::table('student')->where('id', '>', '1')->
//        where('name', '=', '滚滚滚')->orWhere('name', 'like', '嗯%')->get();
//        return $ret;
//    }

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
}
