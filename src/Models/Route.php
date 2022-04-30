<?php

namespace Adityaricki\LaravelPermission\Models;

use Adityaricki\LaravelPermission\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
