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
        $ret = $this->table_obj->where('id', 1)->first();
        return $ret;
    }
}