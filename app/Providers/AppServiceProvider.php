<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Sale;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::first();
        $sale = Sale::first();
        view()->share('setting',$setting);
        view()->share('sale',$sale);
    }
}
