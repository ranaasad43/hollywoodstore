<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\UserDataComposer;
use App\Http\Composers\GenreDataComposer;
use App\Http\Composers\StudioDataComposer;
use App\Http\Composers\FilmDataComposer;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(
          '../components/navbar', UserDataComposer::class);
        View::composer(
          '../components/sidebar', GenreDataComposer::class);
        View::composer(
          '../components/sidebar', StudioDataComposer::class);
        View::composer(
          '../components/feature', FilmDataComposer::class);

    }
}
