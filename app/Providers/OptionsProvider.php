<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Option;

use App\Services\StudioSystemSevice;

use View;

class OptionsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            try {
                $all_options = Option::all();

                $opt = [];

                foreach ($all_options as $otion) {
                    $opt[$otion['name']] = $otion['value'];
                }
                View::share('options', $opt);

                $studio = new StudioSystemSevice();

            //  dd($studio->get_schedule());

                View::share('schedule_today', $studio->get_schedule());
                View::share('schedule_tomorrow', $studio->get_schedule("tomorrow"));

            } catch (Exception $e) {
                View::share('options', []);
            }
        });
    }
}
