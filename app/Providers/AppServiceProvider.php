<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Models\Layout;

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
        
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $cartQuanity = Cart::where('user_id',Auth::id())->count();
                View::share('cartQuantity',$cartQuanity);
            }else {
                View::share('cartQuantity',0);
            }
            $design = Layout::where('id',1)->first();
            View::share("design",$design);
        });
        Paginator::useBootstrap();
    }
}
