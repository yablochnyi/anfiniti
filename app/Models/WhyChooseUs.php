<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $guarded = false;

    protected $casts = [
        'data' => 'array',
    ];
}
