<?php

namespace App\Providers;

use App\Model\Manager\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('uniqueCommon', function ($attribute, $value, $parameters) use ($request) {
            $id = $request->post('id');
            $ret = (new ClassName())->getUnique($value, $id);
            if ($ret->isEmpty()) {
                return true;
            }
            return false;
        });
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
