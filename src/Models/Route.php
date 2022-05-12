<?php

namespace Adityaricki\LaravelPermission\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *  If you want to use uuid, you can uncomment this code
 */

// use Adityaricki\LaravelPermission\Traits\Uuid;

class Route extends Model
{
    use HasFactory;

    /**
     *  If you want to use uuid, you can uncomment this code
     */

    // use Uuid;
    // protected $keyType = 'string';
    // public $incrementing = false;
    // protected $casts = [
    //     'id' => 'string',
    // ];

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
