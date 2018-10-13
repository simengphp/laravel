<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/10
     * Time: 9:52
     */

namespace App\Model\Manager;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassName extends Base
{
    use SoftDeletes;
    const IS_NAV=1;
    const NO_NAV=0;

    protected $table = 'class';
    protected $primaryKey = 'id';
    protected $model = null;
    public $timestamps = true;
    public $fillable = ['class_name', 'title', 'keys', 'desc', 'sort', 'is_nav'];
    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getTimeFormat();
    }

    public function getTimeFormat()
    {
        return time();
    }

     /**模型查询默认是讲时间戳格式化的，如果想返回原样则需加下面函数*/
//    protected function asDateTime($val)
//    {
//        return $val;
//    }
    public function __construct(array $attributes = [])
    {
        $this->model = DB::table('class');
        parent::__construct($attributes);
    }

    public function classList($num, Request $request)
    {
        $search = $request->all();
        if (isset($search['search'])) {
            $ret = ClassName::where('class_name', 'like', '%'.trim($search['search']).'%')
                ->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            $ret->appends(array(
                'search' => $search['search'],
            ));
            return $ret;
        } else {
            $ret = ClassName::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            return $ret;
        }
    }
    public function curdModel(Request $request)
    {
        $data = $request->post();
        if (isset($data['id'])&&$data['id']>0) {
            $class = ClassName::find($data['id']);
            $class->class_name = $data['class_name'];
            $class->sort = $data['sort']??0;
            $class->title = $data['title'];
            $class->keys = $data['keys'];
            $class->desc = $data['desc'];
            $class->is_nav = $data['is_nav'];
            $ret = $class->save();
        } else {
            $ret = ClassName::create($data);
        }

        return $ret;
    }

    public function getOneDetail($id)
    {
        return ClassName::find($id);
    }

    public function delData($id)
    {
        $student = ClassName::find($id);
        return $student->delete();
    }

    public function returnNav($ind = null)
    {
        $arr = [
            self::IS_NAV =>'是',
            self::NO_NAV =>'否',
        ];
        if ($ind != null) {
            return array_key_exists($ind, $arr)?$arr[$ind]:'未知';
        }
        return $arr;
    }

}
