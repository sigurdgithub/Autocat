<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FosterMiddleware
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
        if (!auth()->check() || auth()->user()->fosterFamily_id == null) {
            abort(code: 403, message: 'U bent niet bevoegd voor deze actie.');
        }
        return $next($request);
    }
}
