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
    protected $fillable = [];
    protected $timestamps = true;
    public function __construct(array $attributes = [])
    {
        $this->model = DB::name('information');
        parent::__construct($attributes);
    }

    public function fromDateTime($value)
    {
        return empty($value)??$this->getTimeFormat();
    }
    public function getTimeFormat()
    {
        return time();
    }

    public function articleList()
    {

    }
}
