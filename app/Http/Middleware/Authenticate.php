<?php

namespace App\Http\Middleware;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        else {
            $cartQuantity = Cart::where('user_id',Auth::id())->get();
            dd($cartQuantity);
            View::share('cartQuantity',$cartQuantity);
        }
    }
}
