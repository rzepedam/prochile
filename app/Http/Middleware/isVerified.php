<?php

namespace ProChile\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;

class isVerified
{
    protected $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( auth()->id() != $request->route()->id )
        {
            abort(404);
        }

        return $next($request);
    }
}
