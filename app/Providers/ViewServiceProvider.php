<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\UserDataComposer;
use App\Http\Composers\GenreDataComposer;
use App\Http\Composers\StudioDataComposer;
use App\Http\Composers\FilmDataComposer;
use App\Http\Composers\FilmsDataComposer;
use App\Http\Composers\CartComposer;


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
        View::composer(
          '../components/navbar', CartComposer::class);
        View::composer(
          '../components/showfilms', FilmsDataComposer::class);

    }
}
