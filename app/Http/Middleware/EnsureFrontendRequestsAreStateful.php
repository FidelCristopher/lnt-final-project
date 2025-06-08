<?php

namespace Laravel\Sanctum\Http\Middleware;

use Laravel\Sanctum\Sanctum;

class EnsureFrontendRequestsAreStateful
{
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }
}
