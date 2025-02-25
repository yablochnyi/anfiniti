<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $guarded = false;

    protected $casts = [
        'data' => 'array',
        'seo' => 'array',
    ];
}
