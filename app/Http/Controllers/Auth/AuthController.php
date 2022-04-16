<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public $data = [];
   
  
    public function loginClient(){
        $this ->data['title'] = 'Đăng nhập';
        return view('clients.loginclient',$this->data);
    }
    public function postLogin(Request $request){
       
        $role = 0;
        $request->validate([
            'username' =>'required|min:6',
            'password' =>'required|min:6'
        ], [
            'username.required' =>'Tên đăng nhập không được để trống',
            'username.min' => 'Tên đăng nhập chứa tối thiểu :min ký tự',
            'password.required' =>'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu chứa tối thiểu :min ký tự'
        ]);
        if(Auth::attempt([
            'email' =>$request->input('username'),
            'password' =>$request->input('password'),
            /* 'role' => 1 */ ])
        ){
            if(Auth::user()->role < 4) return redirect()->route('admin.index');
            else if(Auth::user()->role == 4) return redirect()->route('home');
        }
        else {
            session()->flash('error', 'Email hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
        
    }
    public function logout(){
            Auth::logout();
            return redirect()->route('home');
    }

    public function register(){
        $this ->data['title'] = 'Đăng kí tài khoản';
        return view("clients.register",$this->data);
    }

    public function registerAdm(){
        $this ->data['title'] = 'Them nhan vien';
        return view("Admin.account.add",$this->data);
    }
    public function getList(){
        $this ->data['title'] = 'Them nhan vien';
        $this ->data['listUser'] = User::where('role','<','4')->paginate(10);
      /*   dd($this->data); */
        return view("Admin.account.list",$this->data);
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' =>'required|min:6',
            'email'    =>'required|unique:users|email',
            'password' =>'required|confirmed|min:6'
        ]);
        $input['name'] = $request->input('name');
        $input['role'] = $request->input('role',3);
        $input['email'] = $request->input('email');
        $input['password'] = Hash::make($request->input('password')) ;
        User::create($input);
            session()->flash('msg', 'Đăng ký thành công,vui lòng quay lại đăng nhập');
            return redirect()->back();
        
    }
    
    public function postRegisterAdm(Request $request){
        
        $request->validate([
            'fname' =>'required',
            'lname' =>'required',
            'role' =>'integer',
            'address' =>'required',
            'phone' => 'required|min:10|max:11',
            'email'    =>'required|unique:users|email',
            'password' =>'required|min:6'
        ]);
        /* dd($request->input()); */
        $input['name'] = $request->input('fname')." ".$request->input('lname');
        $input['role'] = $request->input('role',3);
        $input['email'] = $request->input('email');
        $input['password'] = Hash::make($request->input('password')) ;
        $input['fname'] = $request->input('fname');
        $input['lname'] = $request->input('lname');
        $input['address'] = $request->input('address');
        $input['phone'] = $request->input('phone');
        /* dd($input); */
        User::create($input);
            session()->flash('msg', 'Đăng ký tài khoản thành công');
            return redirect()->back();
        
    }
}
