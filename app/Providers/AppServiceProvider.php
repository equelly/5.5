<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //загружаем пагинацию указывает путь от \view
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        //
        Carbon::setlocale('ru_Ru');
    }
}
