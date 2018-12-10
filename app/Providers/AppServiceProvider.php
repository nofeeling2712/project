<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        require_once __DIR__.'/../Helpers/simple_html_dom.php';

        $this->app->bind(
            'App\Repositories\Contracts\ChannelRepositoryInterface',
            'App\Repositories\Eloquents\ChannelRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ItemRepositoryInterface',
            'App\Repositories\Eloquents\ItemRepository'
        );
    }
}
