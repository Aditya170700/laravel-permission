<?php

namespace Adityaricki\LaravelPermission\Traits;

use Adityaricki\LaravelPermission\Models\Route;

trait HasRoutes
{
    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }

    public function hasRoute($uri, $method, $name = null, $controller = null)
    {
        return $this->routes
            ->where('uri', $uri)
            ->where('method', $method)
            ->where('name', $name)
            ->where('controller', $controller)
            ->first() ?
            true :
            false;
    }
}
