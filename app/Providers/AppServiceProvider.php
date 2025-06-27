<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\App;

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
    if (App::runningInConsole()) {
        return; // Don't run DB check in CLI/Artisan
    }

    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        throw new HttpResponseException(response()->view('admin.error.database-error', [], 500));
    }
}

   
}
