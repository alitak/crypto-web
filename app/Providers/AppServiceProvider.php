<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Resources\TransactionResource;
use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TransactionResource::withoutWrapping();
    }
}
