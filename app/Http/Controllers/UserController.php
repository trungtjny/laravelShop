<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public function view_profile(){
        return view('clients.account',[
            'title' => 'Tài khoản',
            'account' => Auth::user(),
        ]);
    }
    public function edit_user(Request $request){
        $input = $request->input();
       /*  dd($input); */
        $user = User::where('id',Auth::id())->first();
        if($user->email != $input['email']){
            $request->validate([
                'fname' =>'required',
                'lname' =>'required',
                'email' =>'required|unique:users|email',
            ]);
        }
        if($input['password'] != null && $input['new-password'] != null){
            $request->validate([
                'new-password' =>'min:6',
            ]);

            if(Auth::attempt([
                'email' =>$input['email'],
                'password' =>$input['password']]))
                {
                    $user->password = Hash::make($input['new-password']);    
                }
            else return back()->with("error","Mật khẩu ko đúng");
        }
        if($user->role > 0){
         $user->fname = $input['fname'];
         $user->lname = $input['lname'];
         $user->address = $input['address'];
         $user->city = $input['city'];
         $user->phone = $input['phone'];
         $user->save();
        }
        return back()->with('msg',"thay doi thong tin thanh cong");
    }
}
