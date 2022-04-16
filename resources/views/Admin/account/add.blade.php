@extends('layouts/admin')
@section('title')
    {{$title}}
@endsection
@section('head')
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger text-center ">{{Session::get('error')}}</div>
    @endif
    <div class="row">
        <div class="col-8  p-3 border">
            <h4>Thêm nhân viên</h4>
            <hr>
            <form action="{{route('admin.postaddmember')}}" method="POST">
                @csrf
                <div class="row " >
                    <div class="col-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label for="fname">Họ </label>
                                        <input type="text" name="fname" class="form-control" placeholder="Nhập họ, tên đệm" value="">
                                        @if ($errors->any('fname'))
                                        <span class="text-danger ml-2">{{$errors->first('fname')}}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="col-6 mb-4">
                                        <label for="lname">Tên </label>
                                        <input type="text" name="lname" class="form-control" placeholder="Tên ">
                                        @if ($errors->any('lname'))
                                            <span class="text-danger ml-2">{{$errors->first('lname')}}</span>
                                         @endif
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="phone">Số điện thọai </label>
                                        <input type="text" name="phone" class="form-control" placeholder="0123456789">
                                        @if ($errors->any('phone'))
                                            <span class="text-danger ml-2">{{$errors->first('phone')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="address">Địa chỉ </label>
                                        <input type="text" name="address" class="form-control" placeholder="">
                                        @if ($errors->any('address'))
                                            <span class="text-danger ml-2">{{$errors->first('address')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="email">Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="email đăng nhập">
                                        @if ($errors->any('address'))
                                            <span class="text-danger ml-2">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="password">Mật khẩu </label>
                                        <input type="password" name="password" class="form-control" placeholder="password đăng nhập">
                                        @if ($errors->any('address'))
                                            <span class="text-danger ml-2">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 mb-4" >
                                         <span> Chọn quyền: </span>
                                        <select name="role" id="role" class="px-3" style="height: 40px; border-radius: 10px" ;>
                                            <option value="1"> Admin </option>
                                            <option value="2" selected> Nhân viên </option>
                                            <option value="3"> Nhân viên giao hàng </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Tạo tài khoản</button>
                    </div>
                    <div class="col-5">
                        
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
            
            
     

@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection
@section('css')
    <style>   
    </style>
@endsection
@section('js')
    <script> 
           
    </script>
@endsection

