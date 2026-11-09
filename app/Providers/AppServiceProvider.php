<?php

namespace App\Providers;

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
        // На проді вміст public/ винесено на рівень вище (кореневий каталог
        // хостингу є document root), тож Laravel має вважати цей корінь
        // "публічною" директорією — інакше asset()/storage:link рахують
        // шляхи відносно неіснуючої вже папки public/.
        if (env('PUBLIC_PATH_IS_BASE_PATH', false)) {
            $this->app->bind('path.public', function () {
                return base_path();
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Pagination\Paginator::useBootstrapFive();
    }
}
