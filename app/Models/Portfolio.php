<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = false;
    protected $casts = [
        'seo' => 'array',
        'description' => 'array',
    ];
}
