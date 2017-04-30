<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ShopsList;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $shop_list   = ShopsList::where('is_active',1)->get();
        View::share('shop_list', $shop_list);
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
