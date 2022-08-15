<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use mtgsdk;

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
        if (!Cache::has('mtgSets')){
            $sets = mtgsdk\Set::all();

            $sets = array_map(function ($e){
                return [
                    'name' => $e->name,
                    'type' => $e->type,
                    'code' => $e->code,
                    'date' => $e->releaseDate,
                ];
            }, $sets);

            usort($sets, function ($element1, $element2) {
                $datetime1 = strtotime($element1['date']);
                $datetime2 = strtotime($element2['date']);
                return $datetime1 - $datetime2;
            });

            Cache::forever('mtgSets', $sets);
        }
    }
}
