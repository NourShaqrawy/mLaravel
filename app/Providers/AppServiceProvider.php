<?php

namespace App\Providers;

use Illuminate\Container\Attributes\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //  if(config('app.env')=='production'){
        //     config([            //تغيير قيمة من true الى false في الملف app.php
        //         'app.debug'=>false
        //     ]);
        //  }

        if(config()->get('app.env')=='production'){
           config()->set('app.debug',false); 
            
           //نفس الكود الذي فوقه ولكن بطريقة اجمل
        }

 
    }
}
