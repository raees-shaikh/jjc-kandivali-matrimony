<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->getActiveSubscription()) {
            return $next($request);
        }
        return redirect()->route('frontend.subscription')->with(toast('Buy Subscription to access premium features.'));
    }
}
