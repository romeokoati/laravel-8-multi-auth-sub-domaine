<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('isAdmin', function () {
            return request()->getHttpHost()=== adminUrl();
        });

        Request::macro('isEditor', function () {
            return request()->getHttpHost() === editorUrl();
        });

        Request::macro('isMy', function () {
            return request()->getHttpHost() === myUrl();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
