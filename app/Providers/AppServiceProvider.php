<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Local;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
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

        if (Schema::hasTable('configs')) {
            foreach (Config::all() as $setting) {
                \Illuminate\Support\Facades\Config::set($setting->key, $setting->value);
            }
        }


        App::setLocale(config('app.locale'));
        view()->composer(['frontend.*', 'backend.*', 'frontend-rtl.*','vendor.invoices.*'], function ($view) {


            $appCurrency = getCurrency(config('app.currency'));

            if (Schema::hasTable('locals')) {
                $locales = Local::pluck('short_name as locale')->toArray();
            }

            
            $view->with(compact('locales','appCurrency'));

        });

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
