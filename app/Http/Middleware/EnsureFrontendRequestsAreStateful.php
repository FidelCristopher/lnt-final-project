<?php

namespace Laravel\Sanctum\Http\Middleware;

use Laravel\Sanctum\Sanctum;

class EnsureFrontendRequestsAreStateful
{
    public function handle($request, \Closure $next)
    {
        // Placeholder only; real version comes with Sanctum
        return $next($request);
    }
}
