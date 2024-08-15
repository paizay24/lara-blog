<?php

namespace App\Providers;

use App\Models\Category;
use App\View\Components\NavLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // DB::listen(fn($q) => logger($q->sql));

        // View::share('name','pai zay');
        View::composer(['detail','post.edit','index'],function($view){
            $view->with('categories',Category::latest('id')->get());
        });

        Blade::if('admin',function(){
            return Auth::user()->role === 'admin';
        });
        Blade::if('notAuthor',fn() => Auth::user()->role != 'author');

    }
}
