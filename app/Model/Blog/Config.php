<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Blog;

use Illuminate\Support\Facades\DB;

class Config extends Base
{
    protected $table = 'config';
    protected $model = null;
    public $timestamps = true;
    /**白名单字段*/
    protected $fillable = ['title', 'keys', 'description', 'tel', 'postcode', 'website_code', 'about', 'contact_me'];
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
        $this->model = DB::table('config');
        parent::__construct($attributes);
    }
    public function curdModel($data)
    {
        $config = Config::find($data['id']);
        $config->title = $data['title']??'';
        $config->keys = $data['keys']??'';
        $config->description = $data['description']??'';
        $config->tel = $data['tel']??'';
        $config->postcode = $data['postcode']??'';
        $config->website_code = $data['website_code']??'';
        $config->about = $data['about']??'';
        $config->contact_me = $data['contact_me']??'';
        $ret = $config->save();
        return $ret;
    }

    public function getOneDetail($id)
    {
        return Config::find($id);
    }
}
