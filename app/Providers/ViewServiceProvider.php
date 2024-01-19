<?php

namespace App\Providers;

use App\Http\View\Composers\ProducttypeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

        View::composer('header', ProducttypeComposer::class);
    }
}
