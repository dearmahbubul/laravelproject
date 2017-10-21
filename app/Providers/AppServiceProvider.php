<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*For share all pages*/
        //View::share('name','Mahbubul Alam');
        /*For share specific pages*/
        //View::composer('front.home.home-content',function ($view){
        View::composer('front.includes.header',function ($view){
            $view->with('categoryList', Category::where('publication_status',1)->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
