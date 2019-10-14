<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use App\Dua;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        $dua = Dua::inRandomOrder()->first();
        view()->composer('*', 'App\Http\ViewComposers\FavoriteComposer');
        View::share('dua', $dua);


    }
}
