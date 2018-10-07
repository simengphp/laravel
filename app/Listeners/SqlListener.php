<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 20:54
 */

namespace App\Listeners;


use Illuminate\Database\Events\QueryExecuted;

class SqlListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  =QueryExecuted  $event
     * @return void
     */
    public function handle(QueryExecuted $event) {

        // 在这里编写业务逻辑
        $sql = str_replace("?", "'%s'", $event->sql);
        $log = vsprintf($sql, $event->bindings);
        $log = '[' . date('Y-m-d H:i:s') . '] ' . $log . "\r\n";
        $filepath = storage_path('logs\sql.log');
        file_put_contents($filepath, $log, FILE_APPEND);
    }

}