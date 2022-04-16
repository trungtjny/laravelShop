<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cartItem'] = Cart::where('user_id',Auth::id())->with('products')->get();
        $data['title'] = 'Giỏ hàng';
        return view('clients.cart',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
            if($product_check){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json( ['status' => "Sản phẩm đã có trong giỏ hàng",'result' => "true"]);
                }
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->quantity = $quantity;
                $cartItem ->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status' => $product_check->name." đã được thêm sản phẩm vào giỏ hàng",'result' => "true"]);
            }
        }
        else {
            return response()->json( ['status' => "Vui lòng đăng nhập để tiếp tục.",'result' => "false"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
        {
            $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
            $cartItem->quantity = $quantity;
            $cartItem->update();
            return response()->json(['status' => "Cập nhật số lượng sản phẩm",'result' => "true"]);
        }
        else return response()->json(['status' => "Có lỗi trong quá trình thực hiện. Vui lòng thử lại sau!",'result' => "false"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_id = $request->input('product_id');
        if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
        {
            $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => "Sản phẩm đã được gỡ khỏi giỏ hàng!",'result' => "true"]);
        }
        else return response()->json(['status' => "Có lỗi trong quá trình thực hiện. Vui lòng thử lại sau!",'result' => "false"]);
    }
}
