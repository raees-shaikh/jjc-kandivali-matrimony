<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFormFilled
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
        if (!auth()->user()->full_name) {
            return redirect()->route('frontend.form-one')->with(toast('Please Complete Form', 'info'));
        }
        if (!auth()->user()->mosal_name) {
            return redirect()->route('frontend.form-two')->with(toast('Please Complete Form', 'info'));
        }
        return $next($request);
    }
}
