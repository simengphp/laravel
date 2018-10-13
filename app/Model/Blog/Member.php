<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:10
 */

namespace App\Model\Blog;

use Illuminate\Support\Facades\DB;

class Member extends Base
{
    protected $table = 'member';
    protected $table_obj = null;
    protected $fillable = ['name','account','desc','pic'];
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

    public function curdModel($data)
    {
        $member = Member::find($data['id']);
        $member->name = $data['name']??'';
        $member->account = $data['account']??'';
        $member->desc = $data['desc']??'';
        $member->pic = $data['pic']??'';
        $ret = $member->save();
        return $ret;
    }

    public function getOneDetail($id)
    {
        return Member::find($id);
    }
}
