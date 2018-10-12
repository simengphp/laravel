<?php

namespace App\Providers;

use App\Model\Manager\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        //
        Schema::defaultStringLength(191);
        /**自定义验证方法*/
        Validator::extend('uniqueCommon', function ($attribute, $value, $parameters) use ($request) {
            $id = $request->post('id');
            $ret = (new Base())->getUnique($parameters[0], $attribute, $value, $id);
            if ($ret->isEmpty()) {
                return true;
            }
            return false;
        });
        /**设置全局模板变量*/
        list($controller, $action) = explode('/', $request->path());
        if ($controller == 'blog') {
            list($model, $controller, $action) = explode('/', $request->path());
        }
        View::share("controller", $controller);
        View::share("action", $action);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
