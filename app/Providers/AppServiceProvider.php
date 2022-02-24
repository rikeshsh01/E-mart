<?php

namespace App\Providers;

use App\Http\View\Composers\MasterComposer;
use App\Models\Category;
use Illuminate\Support\Facades\View;
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
        // every single view, it share the variable topCategories 
        View::share('topCategories', Category::with('child')->where(['parent_id'=>null,'status'=>'active'])->get());

        // View::composer('frontend.layouts.master', function ($view) {
        //     $view->with('topCategories', Category::with('child')->where('parent_id',null)->get());
        // });


        // View::composer('frontend.layouts.master',MasterComposer::class);
        // MasterComposer is for this method 

    }
}
