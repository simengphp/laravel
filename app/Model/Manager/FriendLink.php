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

class FriendLink extends Base
{
    use SoftDeletes;
    const IS_NAV=1;
    const NO_NAV=0;

    protected $table = 'friend_link';
    protected $primaryKey = 'id';
    protected $model = null;
    public $timestamps = true;
    public $fillable = ['name', 'value', 'keys', 'sort'];
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
        $this->model = DB::table('friend_link');
        parent::__construct($attributes);
    }

    public function friendList($num, Request $request)
    {
        $search = $request->all();
        if (isset($search['search'])) {
            $ret = FriendLink::where('name', 'like', '%'.trim($search['search']).'%')
                ->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            $ret->appends(array(
                'search' => $search['search'],
            ));
            return $ret;
        } else {
            $ret = FriendLink::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            return $ret;
        }
    }
    public function curdModel(Request $request)
    {
        $data = $request->post();
        if (isset($data['id'])&&$data['id']>0) {
            $class = FriendLink::find($data['id']);
            $class->name = $data['name'];
            $class->value = $data['value'];
            $class->sort = $data['sort']??0;
            $class->status = 0;
            $ret = $class->save();
        } else {
            $ret = FriendLink::create($data);
        }

        return $ret;
    }

    public function getOneDetail($id)
    {
        return FriendLink::find($id);
    }

    public function delData($id)
    {
        $student = FriendLink::find($id);
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
