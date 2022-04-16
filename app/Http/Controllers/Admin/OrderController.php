<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transport;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $data = Order::with('orderUser','orderItems')->orderBy('status', 'asc')->paginate(4);;
        return view('Admin.order.index',[
            'title' => 'Danh sách đơn hàng',
            'orders' => $data
        ]);
    }
    public function finish(){
        $data = Order::where('status', 4)->with('orderUser','orderItems')->paginate(4);
        return view('Admin.order.list',[
            'title' => 'Danh sách đơn hàng',
            'orders' => $data
        ]);
    }
    
    public function view_order($id){
        $order = Order::where('id',$id)->with('orderUser','orderItems')->first();
        $ship = Transport::where('order_id',$id)->with('orderShip')->first();
        return view('Admin.order.show',[
            'title' => 'Đơn hàng',
            'order' => $order,
            'shipper' =>$ship
        ]); 
    }
    public function update(Request $request){
        $id = $request->input('order_id');
        $status = $request->input('order_status');

        if(Order::where('id',$id)->exists())
        {
            $orderItem = Order::where('id',$id)->first();
            $orderItem->status = $status;
            $orderItem->update();
            return response()->json(['status' => "Cập nhật trạng thái thành công",'result' => "true"]);
        }
        else return response()->json(['status' => "Có lỗi sssss trong quá trình thực hiện. Vui lòng thử lại sau!",'result' => "false"]);
    }
}
