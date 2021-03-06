<?php

namespace Adityaricki\LaravelPermission\Console\Commands;

use Adityaricki\LaravelPermission\Models\Route as ModelsRoute;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class SyncRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-permission:sync-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routes = Route::getRoutes()->getRoutes();
        $total = count($routes);

        foreach ($routes as $route) {
            ModelsRoute::firstOrCreate([
                'name' => $route->action['as'] ?? null,
                'uri' => $route->uri,
                'controller' => $route->action['controller'] ?? '',
                'method' => $route->methods[0],
            ]);
        }

        $this->info("Sync {$total} routes successfully");
    }
}
