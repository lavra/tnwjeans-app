<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSliderHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'style',
        'image',
        'thumb',
        'order',
        'active'
    ];
}
