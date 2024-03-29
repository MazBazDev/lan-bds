<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isModo
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
        abort_if(!($request->user()->modo || $request->user()->admin ), 401);
        
        return $next($request);
    }
}
