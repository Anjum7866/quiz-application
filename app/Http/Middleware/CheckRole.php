<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next ,...$roles){
        if (Auth::check()) {
            $user = Auth::user();

            foreach ($roles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }
            return new Response('Unauthorized', 401);
        }
}
