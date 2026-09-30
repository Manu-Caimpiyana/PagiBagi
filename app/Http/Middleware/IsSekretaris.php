<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSekretaris
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role == 'sekretaris') {
            return $next($request);
        } else {
            return redirect()->route('home')->with('error', 'Anda tidak diizinkan untuk mengakses halaman ini');
        }

        return $next($request);
    }
}
