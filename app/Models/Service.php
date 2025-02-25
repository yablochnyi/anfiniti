<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = false;

    protected $casts = [
        'experience_small' => 'array',
        'experience_full' => 'array',
        'seo' => 'array',
    ];
}
