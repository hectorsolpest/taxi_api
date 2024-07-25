<?php

namespace App\Providers;

use App\Http\Resources\BaseResource;
use App\Http\Resources\JourneyResource;
use App\Http\Resources\TaxiResource;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        $this->app->bind('App\Http\Resources\BaseResource', function ($app, $model) {
            return new BaseResource($model);
        });

        $this->app->bind('App\Http\Resources\TaxiResource', function ($app, $model) {
            return new TaxiResource($model);
        });

        $this->app->bind('App\Http\Resources\JourneyResource', function ($app, $model) {
            return new JourneyResource($model);
        });
    }
}
