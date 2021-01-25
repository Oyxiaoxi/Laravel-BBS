<?php

namespace App\Providers;

use JPush\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class JpushServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \Log::info(config('jpush.key'));
        \Log::info(config('jpush.secret'));

        $this->app->singleton(Client::class, function ($app) {
            return new Client(config('jpush.key'), config('jpush.secret'));
        });

        $this->app->alias(Client::class, 'jpush');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
