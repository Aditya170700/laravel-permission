<?php

namespace Adityaricki\LaravelPermission\Traits;

use Ramsey\Uuid\Uuid as Generator;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                if (config('laravel-permission.use-uuid')) {
                    $model->id = Generator::uuid4()->toString();
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage(), 500);
            }
        });
    }
}
