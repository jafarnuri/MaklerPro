<?php

namespace App\Providers;

use App\Models\Setting;
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
        view()->composer('*', function ($view) {
            // Setting cədvəlində ilk qeydi alırıq
            $siteName = Setting::first(); 
    
            // 'siteName' dəyişəni ilə cədvəldən alınan name dəyərini göndəririk
            $view->with('siteName', $siteName); // Tam 'Setting' obyektini göndəririk
        });
    }
    
}
