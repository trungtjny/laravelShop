<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'baner',
        'slider1',
        'slider1',
        'slider1',
        'slogan',
    ];
}
