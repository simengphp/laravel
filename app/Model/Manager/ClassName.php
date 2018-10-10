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
    protected $table = 'class';
    protected $primaryKey = 'id';
    protected $model = null;
    public $timestamps = true;
    public $fillable = ['class_name', 'sort'];
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

    public function classList($num)
    {
        $ret = ClassName::orderBy('created_at', 'desc')->orderBy('sort', 'asc')->paginate($num);
        return $ret;
    }

    public function curdModel(Request $request)
    {
        $data = $request->post();
        if (isset($data['id'])) {
            $class = ClassName::find($data['id']);
            $class->class_name = $data['class_name'];
            $class->sort = $data['sort'];
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

    public function getUnique($class_name, $id = 0)
    {
        if ($id > 0) {
            return DB::table('class')
                ->where('class_name', $class_name)->where('deleted_at', null)->
                where('id', '<>', $id)->get();
        }
        return DB::table('class')
            ->where('class_name', $class_name)->where('deleted_at', null)->get();
    }
}
