<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  string $role = null): Response
    {
        function run_role($next, $request, $role)
        {
            if (Auth::check()){
                if (auth()?->user()?->role_id === $role){
                    return $next($request);
                }else {
                    abort(403);
                }
            }else {
                abort(403);
            }
        }

        if($role === "user"){
            return run_role($next, $request, 2);
        }elseif ($role === "admin"){
            return run_role($next, $request, 1);
        }else {
            abort(404);
        }
    }
}
