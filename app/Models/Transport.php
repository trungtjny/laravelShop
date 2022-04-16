<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table = 'transports';
    protected $fillable =[
        'order_id',
        'ship_id',
        'message',
    ];
    public function orderShip(){
        return  $this->belongsTo(User::class,'ship_id','id');
    }
    public function order(){
        return  $this->belongsTo(Order::class,'order_id','id');
    }
}
