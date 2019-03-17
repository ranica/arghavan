<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::withoutDoubleEncoding();
        Paginator::useBootstrapThree();
        $vacationCount = 0;

        try
        {
            $vacationCount = \App\VacationRequest::getVacationUnReaded ();
        }
        catch (\Exception $e)
        {
            $vacationCount = 0;
        }

        \View::share ('vacationCount',
                      $vacationCount);

        \Blade::if ('isUniversity', function () {

            // Custom criteria
            $result = \App\SystemInfo::select('value')
                            ->get();
            if($result[0]->value){
                return true;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('path.public', function() {
        //     return realpath(base_path().'/../public_html');
        // });
    }
}
