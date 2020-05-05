<?php

namespace App\Providers;

use Twilio\Jwt\ClientToken;
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
        $this->app->bind(
            ClientToken::class, function ($app) {
                $accountSid = config('twilio.accountSid');
                $token = config('twilio.authToken');

                return new ClientToken($accountSid, $token);
            }
        );


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
