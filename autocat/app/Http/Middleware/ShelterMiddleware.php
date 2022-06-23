<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShelterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // ShelterMiddleware restricts routing to pages for fosters
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->shelter_id == null) {
            abort(code: 403,  message: 'U heeft geen toegang tot deze pagina');
        }
        return $next($request);
    }
}
