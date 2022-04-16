@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-3 ">
    <div class="bg-warning py-2">
        <h5 class="m-1 px-2"><a class="text-dark" href="{{route('home')}}">Trang chủ</a> / <a class="text-dark" href="{{route('cart')}}">Giỏ hàng</a> / <a class="text-dark" href="{{route('cart')}}">Thanh toán</a></h5>
    </div>
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger text-center ">{{Session::get('error')}}</div>
                @endif
    <form action="{{route('order')}}" method="POST">
        <div class="row " style="min-height: 55vh">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Thông tin giao hàng</h6>
                        <hr>
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
                                <label for="city">Thành phố/Tỉnh </label>
                                <input type="text" name="city" class="form-control" placeholder="Tên tỉnh, thành phố">
                                @if ($errors->any('city'))
                                    <span class="text-danger ml-2">{{$errors->first('city')}}</span>
                                @endif
                            </div>
                            <div class="col-12 mb-4">
                                <label for="address">Địa chỉ nhận hàng </label>
                                <input type="text" name="address" class="form-control" placeholder="Tên đường, số nhà, xã-phường, quận-huyện">
                                @if ($errors->any('address'))
                                    <span class="text-danger ml-2">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Đơn hàng:</h6>
                        <hr>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice=0;
                                @endphp
                                @foreach ($cartItem as $item)
                                    @if ($item->products->amount >= $item->quantity)
                                        @php
                                            ($item->products->active_sale) ? $price = $item->products->price_sale : $price = $item->products->price;
                                            $totalPrice += $price*$item->quantity;
                                        @endphp
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$price}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6  d-flex align-items-center" style="">
                                Thanh toán: {{number_format($totalPrice)}}VND
                                <input type="number" hidden name="totalPrice" value="{{$totalPrice}}" class="form-control" >
                            </div>
                            <div class="col-6  d-grid gap-2 " style="">
                                <button class="btn btn-primary rounded-pill" type="submit">Đặt hàng</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
</div>
@endsection
@section('sidebar')
    
@endsection
@section('css')
   
@endsection
@section('js')
    <script>
      
    </script>
@endsection