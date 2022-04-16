<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $this->data['title'] = "Trang quản trị";
        $this->data['newOrders'] =  Order::where('status','<', 2)->get()->count();
        $this->data['totalProducts'] =  Product::where('active', 1)->get()->count();
        $this->data['outOfStock'] = Product::where('amount','<', 10)->get()->count();
        $this->data['orderDestroy'] = Order::where('status', 5)->get()->count();
        /* dd($this->data); */
        return view('Admin.dashboad',$this->data);
    }
}
