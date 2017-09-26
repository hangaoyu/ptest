<?php

namespace Hgy\PackageTest\Middleware;

use Closure;


class SecondMiddleware
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
        dump('second');
        $response = $next($request);


        return $response;
    }


}
