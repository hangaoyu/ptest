<?php

namespace Hgy\PackageTest\Middleware;

use Closure;


class FirstMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        dump('first');
        $response = $next($request);


        return $response;
    }


}
