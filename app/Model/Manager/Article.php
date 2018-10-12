<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Manager;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Base
{
    use SoftDeletes;
    protected $table = 'article';
    protected $model = null;
    public $timestamps = true;
    /**白名单字段*/
    protected $fillable = ['pic', 'title', 'content', 'desc', 'author', 'look', 'sort', 'key',
        'class_id'];
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
        $this->model = DB::table('information');
        parent::__construct($attributes);
    }

    public function articleList($num, $data)
    {
        if (isset($data['search_date']) && $data['search_date'] != '请选择日期') {
            $search_date = $this->getTime($data['search_date']);
            $start_time = $search_date['start']??'';
            $end_time = $search_date['end']??time();
        } else {
            $start_time = $search_date['start']??'';
            $end_time = $search_date['end']??time();
        }
        if (isset($data['search']) || isset($search_date)) {
            $list = Article::where('title', 'like', '%'.trim($data['search']).'%')->
            where('created_at', '>=', $start_time)->
            where('updated_at', '<=', $end_time)->orderBy('created_at', 'desc')->
            orderBy('sort', 'asc')->paginate($num);
            $list->appends([
                'search'        =>$data['search'],
                'search_date'   =>$data['search_date'],
            ]);
        } else {
            $list = Article::orderBy('created_at', 'desc')->orderBy('sort', 'asc')->paginate($num);
        }
        return $list;
    }

    public function curdArticle($data)
    {
        if (isset($data['id']) && $data['id'] > 0) {
            $article = Article::find($data['id']);
            $article->title = $data['title'];
            $article->pic = $data['pic'];
            $article->content = $data['content'];
            $article->desc = $data['desc'];
            $article->author = $data['author'];
            $article->look = $data['look'];
            $article->sort = $data['sort'];
            $article->key = $data['key'];
            $article->class_id = $data['class_id'];
            $ret = $article->save();
        } else {
            $ret = Article::create($data);
        }
        return $ret;
    }

    public function getOneDetail($id)
    {
        return Article::find($id);
    }

    public function delData($id)
    {
        $model = Article::find($id);
        return $model->delete();
    }
}
