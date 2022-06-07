<?php

namespace Adityaricki\LaravelPermission\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Adityaricki\LaravelPermission\Traits\Uuid;

class Route extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return config('laravel-permission.use-uuid') ? 'string' : $this->keyType;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return config('laravel-permission.use-uuid') ? false : $this->incrementing;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
