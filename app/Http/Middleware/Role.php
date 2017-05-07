<?php

namespace ProChile\Http\Middleware;

use Closure;

class Role
{
    protected $hierarchy = [
        'cqtime'  => 4,
        'dir_nac' => 3,
        'dir_reg' => 2,
        'staff'   => 1
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if ( $this->hierarchy[ auth()->user()->role->acr ] < $this->hierarchy[ $role ] )
        {
            return abort(404);
        }

        return $next($request);
    }
}
