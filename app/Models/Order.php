<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable =[
        'user_id',
        'fname',
        'lname',
        'phone',
        'city',
        'totalprice',
        'address',
        'status',
        'message'
    ];
    public function orderItems(){
        return $this ->hasMany(OrderItem::class);
    }
    public function orderUser(){
        return  $this->belongsTo(User::class,'user_id','id');
    }
}
