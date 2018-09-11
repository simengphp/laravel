<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 9:26
     */

namespace App\Http\Middleware;

use Closure;

class Activity
{
    public function handle($request, Closure $next)
    {
//        if (time() < strtotime('2018-09-12')) {
//            return redirect('ActivityStart');
//        }
//        return $next($request);
    }
}
