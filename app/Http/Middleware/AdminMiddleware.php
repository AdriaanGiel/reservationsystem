<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

        if ($user != null) {
            if ($user->isAdmin()) {
                return $next($request);
            } else {
                return abort(403, 'Unauthorized action.');
            }
        }

        return abort(403, 'Unauthorized action.');
    }
}
