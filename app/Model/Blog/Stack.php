<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Stack extends Base
{
    use SoftDeletes;
    protected $table = 'stack';
    protected $model = null;
    public $timestamps = true;
    /**白名单字段*/
    protected $fillable = ['name', 'sort', 'pic', 'stack', 'desc', 'website', 'contact'];
    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getTimeFormat();
    }

    public function getTimeFormat()
    {
        return time();
    }

    public function __construct(array $attributes = [])
    {
        $this->model = DB::table('stack');
        parent::__construct($attributes);
    }

    public function modelList($num, $data)
    {
        if (isset($data['search'])) {
            $list = Stack::where('name', 'like', '%'.trim($data['search']).'%')->
            orwhere('contact', 'like', '%'.trim($data['search']).'%')->
            orderBy('created_at', 'desc')->
            orderBy('sort', 'asc')->paginate($num);
            $list->appends([
                'search'        =>$data['search'],
            ]);
        } else {
            $list = Stack::orderBy('created_at', 'desc')->orderBy('sort', 'asc')->paginate($num);
        }
        return $list;
    }

    public function curdModel($data)
    {
        if (isset($data['id']) && $data['id'] > 0) {
            $model = Stack::find($data['id']);
            $model->name = $data['name'];
            $model->sort = $data['sort'];
            $model->pic = $data['pic'];
            $model->stack = $data['stack'];
            $model->desc = $data['desc'];
            $model->website = $data['website'];
            $model->contact = $data['contact'];
            $ret = $model->save();
        } else {
            $ret = Stack::create($data);
        }
        return $ret;
    }

    public function getOneDetail($id)
    {
        return Stack::find($id);
    }

    public function delData($id)
    {
        $model = Stack::find($id);
        return $model->delete();
    }
}
