<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipperController extends Controller
{
    public function index(){
        $data = Order::where('status',1)->with('orderUser','orderItems')->get();
        return view('Admin.ship.index',[
            'title' => 'Danh sách đơn hàng',
            'orders' => $data
        ]);
    }
    public function myWork(){
        $data = Transport::where('ship_id',Auth::id())->with('orderShip')->with(['order' => function ($query) {
            $query->where('status', '<', 4);
        }])->get();
        /* dd($data);  */
        return view('Admin.ship.list',[
            'title' => 'Việc cần làm',
            'data' => $data
        ]);
    }
    public function history(){
        $data = Transport::where('ship_id',Auth::id())->with('orderShip')->with(['order' => function ($query) {
            $query->where('status', '>', 3);
        }])->get();
       /*  dd($data); */
        return view('Admin.ship.history',[
            'title' => 'Đơn hàng đã làm',
            'data' => $data
        ]);
    }

    public function view($id){
        $order = Order::where('id',$id)->with('orderUser','orderItems')->first();
        $ship = Transport::where('order_id',$id)->with('orderShip')->first();
        
        return view("Admin.ship.show",[
            'title' => 'Đơn hàng',
            'order' => $order,
            'shipper' =>$ship
        ]); 
    }

    public function addWork( Request $request ){
        $order_id = $request->input('order_id');
        $order = Order::where('id',$order_id)->first();
        
        if($order->status == 1){
            $trans = new Transport();
            $trans->order_id = $order_id;
            $trans->ship_id = Auth::id();
            $trans->save();

            $order->update(array('status'=> 2));
            return response()->json(['status' => "Nhận đơn thành công, vui lòng tới kho hàng để nhận bưu phẩm",'result' => "true"]);
        }
        else {
            return response()->json(['status' => "Có lỗi trong quá trình thực hiện. Vui lòng thử lại sau!",'result' => "false"]);
        }   
    }
}
