<?php

return [
    'use-uuid' => env('USE_UUID', true),
    'models' => [
        'route' => Adityaricki\LaravelPermission\Models\Route::class,
    ],
    'tables' => [
        'routes' => 'routes',
    ]
];
