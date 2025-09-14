<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtesanoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function handle(Request $request, Closure $next): \Symfony\Component\HttpFoundation\Response
{
    if (auth()->check() && in_array(auth()->user()->rol, ['artesano', 'administrador'])) {
        return $next($request);
    }

    abort(403, 'Acceso solo para artesanos o administradores');
}
}