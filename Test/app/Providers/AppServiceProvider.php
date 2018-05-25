<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //监听SQL语句的执行，并将其存储到一个叫.sqls的文件夹，存储在public目录下
        DB::listen(function ($query) {
        	  file_put_contents('.sqls', "[".date('Y-m-d H:i:s')."]".$query->sql."\r\n", FILE_APPEND);
            // $query->sql
            // $query->bindings
            // $query->time
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
