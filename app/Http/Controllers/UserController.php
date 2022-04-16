<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function my_orders(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('clients.orders.order',[
            'title' => 'Đơn hàng',
            'orders' => $orders,
        ]);
    }
    public function view_order($id){
        $order = Order::where('id',$id)->where('user_id', Auth::id())->first();
        
        return view('clients.orders.orderDetail',[
            'title' => 'Đơn hàng',
            'order' => $order,
        ]);
    }
}
