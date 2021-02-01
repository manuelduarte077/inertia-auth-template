<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Inertia::share([
            "flash" => function () {
                return [
                    "status" => session("status"),
                    "success" => session("success"),
                    "error" => session("error"),
                ];
            },
            "request" => function () {
                return [
                    "token" => request()->route("token"),
                ];
            }
        ]);
    }
}
