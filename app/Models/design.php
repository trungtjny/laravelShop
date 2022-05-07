<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner',
        'slider1',
        'slider2',
        'slider3',
        'slogan',
    ];
}
