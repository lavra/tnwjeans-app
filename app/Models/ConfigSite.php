<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'color_style',
        'layout_style',
        'separator_style',
        'mainslider'
    ];


}
