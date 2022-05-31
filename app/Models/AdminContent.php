<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'order',
        'title',
        'text',
        'description',
        'active'
    ];
}
