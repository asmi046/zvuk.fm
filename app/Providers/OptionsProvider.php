<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Option;

use App\Services\StudioSystemSevice;
use App\Services\ScheduleFileSevice;

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

                $studio = new ScheduleFileSevice();

                $today = $studio->get_schedule();
                $tomorrow = $studio->get_schedule("tomorrow");

                // dd($today, $tomorrow);
                if (empty($today) || empty($tomorrow)) {
                    $studio = new StudioSystemSevice();

                    $today = $studio->get_schedule();
                    $tomorrow = $studio->get_schedule("tomorrow");
                }


                // dd($today);



                View::share('schedule_today', $today);
                View::share('schedule_tomorrow', $tomorrow);

            } catch (Exception $e) {
                View::share('options', []);
            }
        });
    }
}
