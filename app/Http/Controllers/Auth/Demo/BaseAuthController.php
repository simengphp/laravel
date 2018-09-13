<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/13
     * Time: 17:31
     */

namespace App\Http\Controllers\Auth\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseAuthController extends Controller
{
    protected $rules = [];

    protected $message = [];

    protected $customAttributes = [];

    public function goCheck(Request $request)
    {
        $validate = Validator::make($request->input(), $this->rules, $this->message, $this->customAttributes);
        if ($validate->fails()) {
            return $validate;
        }
        return true;
    }
}
