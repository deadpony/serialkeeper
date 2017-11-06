<?php

namespace App\Components\Sources\Provider;

use App\Components\Sources\SourceContract;
use App\Components\Sources\TheMovieDB\TheMovieDB;
use Illuminate\Support\ServiceProvider;

class SourceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SourceContract::class, TheMovieDB::class);
    }
}

