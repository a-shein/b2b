<?php

namespace App\Providers;

use App\Http\Controllers\TopicService;
use App\Service\CustomerService;
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
        $this->app->bind(CustomerService::class, function(): CustomerService {
            return new CustomerService();
        });

        $this->app->bind(TopicService::class, function(): TopicService {
            return new TopicService();
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
