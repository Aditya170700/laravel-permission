# Laravel Permission

[![Issues](https://img.shields.io/github/issues/Aditya170700/laravel-permission?style=flat-square)](https://github.com/Aditya170700/contact/issues)
[![Stars](https://img.shields.io/github/stars/Aditya170700/laravel-permission?style=flat-square)](https://github.com/Aditya170700/contact/star)

This package allows you to manage permissions in your routes

### Installation:

```bash
composer require adityaricki/laravel-permission
```

Register service provider in your `config/app.php` file:

```php
Adityaricki\LaravelPermission\LaravelPermissionServiceProvider::class
```

Publishing vendor files:

```bash
php artisan vendor:publish --provider="Adityaricki\LaravelPermission\LaravelPermissionServiceProvider"
```

This command will be
Copied File [/vendor/adityaricki/laravel-permission/src/config/laravel-permission.php] To [/config/laravel-permission.php] and Copied Directory [/vendor/adityaricki/laravel-permission/src/database/migrations] To [/database/migrations]

### Model and Migration

This package comes with routes & route_user migration using uuid
if you are no problem about that
use trait `Adityaricki\LaravelPermission\Traits\Uuid` in user model
change user migration
`$table->id();` to `$table->uuid('id')->primary();`
else
change routes & route_user migration
`$table->uuid('id')->primary();` to `$table->id();`

Run migration:

```bash
php artisan migrate
```

### Middleware

This package comes with middleware `Adityaricki\LaravelPermission\Middleware\PermissionMiddleware`
you can add them in your `app\Http\Kernel.php` file

```php
protected $routeMiddleware = [
    // ...
    'laravel-permission' => \Adityaricki\LaravelPermission\Middleware\PermissionMiddleware::class,
];
```

Then you can protect your routes using middleware rules:

```php
Route::group(['middleware' => 'laravel-permission'], function () {
    // Route::get(...);
    // Route::post(...);
    // Route::put(...);
    // Route::delete(...);
    // Route::resource(...);
});
```

### Sync Routes

You can sync routes in database using this command

```bash
php artisan laravel-permission:sync-routes
```

### Attach, Detach and Sync route_user

To attach route into user you can use this code

```php
// Attach 1 route into user
$user->routes()->attach($routeId);
// Attach multiple routes into user
$user->routes()->attach([$routeId1, $routeId2, $routeId3, ...]);
```

To detach route from user you can use this code

```php
// Detach 1 route from user
$user->routes()->detach($routeId);
// Detach multiple routes from user
$user->routes()->detach([$routeId1, $routeId2, $routeId3, ...]);
```

To sync route from user you can use this code

```php
// Sync routes to user
$user->routes()->sync([$routeId1, $routeId2, $routeId3, ...]);
// Sync routes to user without detaching
$user->routes()->syncWithoutDetaching([$routeId1, $routeId2, $routeId3, ...]);
```
