<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialFollow extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'social_network_id',
        'city',
        'local',
        'region',
        'country',
        'zip_code'
    ];
}
