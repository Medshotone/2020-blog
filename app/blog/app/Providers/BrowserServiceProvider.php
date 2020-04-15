<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\BrowserCheckService;

class BrowserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['blog.article.*', 'blog.category.*'], function ($view) {
            $view->with('browsers', BrowserCheckService::getBrowsers());
        });
    }
}
