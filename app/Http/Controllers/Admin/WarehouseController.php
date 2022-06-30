<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
  
    public function index()
    {   
        $data = warehouse::with('product')->get();
        $title = "Kho hàng";
        return view('Admin.warehouse.index',compact('data','title'));
    }

    public function create()
    {
        $title = "Nhập kho";
        $products = [];
        $products = Product::pluck('name','id')->toArray();
        return view('Admin.warehouse.create',compact('title','products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'exists:products,id',
            'amount' => 'required',
            'price' => 'required'
        ]);
        $product = Product::findOrFail($request->product_id);
        $product->amount += $request->amount; 
        $product->save();
        $a = warehouse::create($request->all());
        return back()->with('msg','Tạo đơn nhập kho thành công');
    }

    public function show($id)
    {
        $data = warehouse::findOrFail($id);
        return view('Admin.warehouse.show',compact('data'));
    }

    public function edit($id)
    {
        $products = [];
        $title = "Sửa đơn nhập hàng";
        $products = Product::pluck('name','id')->toArray();
        $data = warehouse::with('product')->findOrFail($id);
        return view('Admin.warehouse.edit',compact('data','products','title'));
    }

    public function update(Request $request, $id)
    {
        $data = warehouse::findOrFail($id);
        $data->update($request->all());
        return back()->with('msg','Sửa đơn nhập kho thành công');

    }

    public function destroy($id)
    {
        
    }
}
