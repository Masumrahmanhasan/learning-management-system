<?php

namespace App\Providers;

use App\Models\Local;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['backend.*'], function ($view) {

            $locale_full_name = 'English';
            $locale =  Local::where('short_name','=',config('app.locale'))->first();
            if($locale){
                $locale_full_name = $locale->name;
            }

            $view->with(compact('locale_full_name'));
        });
    }
}
