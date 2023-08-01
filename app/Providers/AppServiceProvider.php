<?php

namespace App\Providers;

use App\Http\Contracts\TestContract;
use App\Http\Services\TestApiService;
use App\Http\Services\TestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
      TestContract::class => TestApiService::class
    ];

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
    }
}
