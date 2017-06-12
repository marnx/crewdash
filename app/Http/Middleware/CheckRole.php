<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     * If a user wants to login his role is checked
     * If the user hasn't the role that was asked for he is redirected to the home page
     */
    public function handle($request, Closure $next, $role)
    {
      if($request->user()->hasRole($role)) {
        return $next($request);
      } else {
        return redirect()->intended('/login');
      }
    }
}
