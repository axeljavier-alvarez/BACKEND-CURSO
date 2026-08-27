<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    // si esta autenticado admin guard sino regresa a admin.login
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(auth()->guard('admin')->check()){
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
