<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cartItem'] = Cart::where('user_id',Auth::id())->get();
        $data['title'] = 'Thanh toán';
        
        return view('clients.checkout',$data);
    }
    public function order(Request $request)
    {
       $this->validateCheckout($request);
       $input = $request->all();
       
       $input['user_id'] = Auth::id();
       $order = Order::create($input); 

       $cartItem = Cart::where('user_id',Auth::id())->get();

       foreach($cartItem as $item){
           if($item->products->amount >= $item->quantity){
                ($item->products->active_sale) ? $price = $item->products->price_sale : $price = $item->products->price;
               OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' =>$item->product_id,
                    'quantity' =>$item->quantity,
                    'price' => $price,
               ]);
               $item->delete();
               $productItem = Product::where('id',$item->products->id)->first();
               $productItem->amount = $item->products->amount -$item->quantity;
               $productItem->sold = $item->products->sold + $item->quantity;
               $productItem->update();

               $user = User::where('id',Auth::id())->first();
               if($user->role ==4){
                $user->fname = $input['fname'];
                $user->lname = $input['lname'];
                $user->address = $input['address'];
                $user->city = $input['city'];
                $user->phone = $input['phone'];
                $user->save();
               }
               
           }
       }
       return redirect()->route('myoders');


    }
    public function validateCheckout($request){
        $request->validate([
            'fname' =>'required',
            'lname' =>'required',
            'city' =>'required',
            'address' =>'required',
            'phone' =>'required|min:10|max:11'
        ]/* , [
            'fname.required' =>'Họ đệm không được để trống',
            'lname.required' => 'Tên không được để trống',
            'phone.required' =>'vui lòng nhập số điện thoại',
            'phone.min' => 'Số điện thoại bạn nhập không chính xác',
            'phone.max' => 'Số điện thoại bạn nhập không chính xác'
        ] */);
    }
}
