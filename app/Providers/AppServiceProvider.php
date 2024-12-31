<?php

namespace App\Providers;

use App\Models\PassportClient;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addDays(1));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        // Passport::enablePasswordGrant();
        Passport::tokensCan([
            'view-user' => 'View User information',
        ]);

        Passport::useClientModel(PassportClient::class);
    }
}
