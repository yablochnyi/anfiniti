<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPage extends Model
{
    protected $guarded = false;

    protected $casts = [
        'seo' => 'array',
    ];
}
