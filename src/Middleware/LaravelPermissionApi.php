<?php

namespace Adityaricki\LaravelPermission\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;

class LaravelPermissionApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $uri = $route->uri;
        $method = $route->methods[0];
        $name = $route->action['as'] ?? null;
        $controller = $route->action['controller'] ?? '';

        if ($request->user()->hasRoute($uri, $method, $name, $controller)) {
            return $next($request);
        }

        throw new AuthorizationException("You not allowed to access this route", 403);
    }
}
