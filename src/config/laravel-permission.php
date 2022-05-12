<?php

return [
    'use-uuid' => env('USE_UUID', false),
    'models' => [
        'route' => Adityaricki\LaravelPermission\Models\Route::class,
    ],
    'tables' => [
        'routes' => 'routes',
    ]
];
