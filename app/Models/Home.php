<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $guarded = false;

    protected $casts = [
        'seo' => 'array',
        'header' => 'array',
        'first_block' => 'array',
        'two_block' => 'array',
        'three_block' => 'array',
        'four_block' => 'array',
        'five_block' => 'array',
        'six_block' => 'array',
        'seven_block' => 'array',
        'footer' => 'array'
    ];
}
