<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'thumb',
        'price',
        'price_sale',
        'amount',
        'sold',
        'description',
        'product_content',
        'active',
        'active_sale'
    ];

    public function category(){
        return  $this->belongsTo(Category::class,'category_id','id');
    }
}
