<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderControllerClient extends Controller
{
    public function my_orders(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('clients.orders.order',[
            'title' => 'Đơn hàng',
            'orders' => $orders,
        ]);
    }
   
    public function view_order($id){
        $order = Order::where('id',$id)->where('user_id', Auth::id())->with('orderItems')->first();
       /*  dd($order); */
        return view('clients.orders.orderDetail',[
            'title' => 'Đơn hàng',
            'order' => $order,
        ]);
    }

    public function update_order(Request $request){
        $order = Order::where('id',$request->id)->where('user_id', Auth::id())->first();
        if($order->status == 0 ){
            $order->update($request->input());
            return response()->json( ['status' => "Cập nhật thông tin thành công!",'result' => "true"]);
        }
    }

    public function remove_order(Request $request){
        /* dd($request->input()); */
        $order = Order::where('id',$request->id)->where('user_id', Auth::id())->first();
        if($order->status <= 1 ){
            foreach($order->orderItems as $item){
                $item->products->amount += $item->quantity;
                $item->products->sold -= $item->quantity;
                $item->products->save();
            }
            $order->status =6;
            $order->save();
            return response()->json( ['status' => "Huỷ đơn hàng thành công!",'result' => "true"]);
        }
    }
}
