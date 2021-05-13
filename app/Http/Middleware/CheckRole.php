<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        // check if there is an authenticated user
        if (Auth::user() === null) {
            return response("Insufficient permissions", 401);
        }

        // get the action array from the request
        $actions = $request->route()->getAction();

        // get all roles needed to access the resource
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        /**
         * allow the user to access the resource 
         * if he/she has one of the roles required or
         * if no roles were assigned to that resource
         *  */
        if (Auth::user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }

        return response("Insufficient permissions", 401);
    }
}
