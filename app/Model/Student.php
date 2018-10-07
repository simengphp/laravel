<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 15:11
     */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_NAN = 1;
    const SEX_NV = 2;
    const SEX_NULL = 0;

    protected $table = 'student';

    protected $fillable = ['name', 'age', 'sex', 'img'];

    public $timestamps = true;

//    public static function getData()
//    {
//        //$ret = DB::select('select * from db_student');
//        $ret = DB::table('student')->where('id', '>', '1')->
//        where('name', '=', '滚滚滚')->orWhere('name', 'like', '嗯%')->get();
//        return $ret;
//    }
    public function fromDateTime($value)
    {
        return empty($value) ? $value : $this->getDateFormat();
    }

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    public function returnSex($ind = null)
    {
        $arr = [
            self::SEX_NAN => '男',
            self::SEX_NULL => '未知',
            self::SEX_NV => '女',
        ];

        if ($ind !== null) {
            return array_key_exists($ind, $arr) ? $arr[$ind]:$arr[self::SEX_NULL];
        }
        return $arr;
    }
}
