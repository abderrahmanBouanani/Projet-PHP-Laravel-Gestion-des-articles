<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfilAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('profil_id') || !session()->has('profil_email')) {
            return redirect()->route('profil')->with('error', 'Vous devez être connecté.');
        }
        return $next($request);
    }
}
