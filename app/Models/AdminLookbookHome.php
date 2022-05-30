<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLookbookHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'thumb',
        'order',
        'active'
    ];
}
