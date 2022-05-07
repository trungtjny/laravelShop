@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-5  ">
    <div class="bg-light">
        @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger text-center ">{{Session::get('error')}}</div>
    @endif
    <div class="mb-3">
        <div class="row ">
            <div class="col-12">
                <div class="d-flex  align-items-center border-top border-bottom bg-secondary text-white" style="height: 60px">
                    <p class="m-0 ps-2">Trang chủ > </p>
                    <p class="m-0 ps-2"> {{$title}} </p>
                </div>
            </div>
        </div>
    </div> 
    <form action="{{route('order')}}" method="POST">
        <div class="row " >
            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Thông tin giao hàng</h6>
                        <hr>
                        <div class="row">
                            <div class="col-6 mb-4">
                                <label for="fname">Họ </label>
                                <input type="text" name="fname" class="form-control" placeholder="Nhập họ, tên đệm" value="{{Auth::user()->fname}}">
                                @if ($errors->any('fname'))
                                <span class="text-danger ml-2">{{$errors->first('fname')}}</span>
                                @endif
                            </div>
                            
                            <div class="col-6 mb-4">
                                <label for="lname">Tên </label>
                                <input type="text" name="lname" class="form-control" placeholder="Tên " value="{{Auth::user()->lname}}">
                                @if ($errors->any('lname'))
                                    <span class="text-danger ml-2">{{$errors->first('lname')}}</span>
                                 @endif
                            </div>
                            <div class="col-6 mb-4">
                                <label for="phone">Số điện thọai </label>
                                <input type="text" name="phone" class="form-control" placeholder="0123456789" value="{{Auth::user()->phone}}">
                                @if ($errors->any('phone'))
                                    <span class="text-danger ml-2">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="col-6 mb-4">
                                <label for="city">Thành phố/Tỉnh </label>
                                <input type="text" name="city" class="form-control" placeholder="Tên tỉnh, thành phố" value="{{Auth::user()->city}}">
                                @if ($errors->any('city'))
                                    <span class="text-danger ml-2">{{$errors->first('city')}}</span>
                                @endif
                            </div>
                            <div class="col-12 mb-4">
                                <label for="address">Địa chỉ nhận hàng </label>
                                <input type="text" name="address" class="form-control" placeholder="Tên đường, số nhà, xã-phường, quận-huyện" value="{{Auth::user()->address}}" >
                                @if ($errors->any('address'))
                                    <span class="text-danger ml-2">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
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
                                <button class="btn btn-cart rounded-pill" type="submit">Đặt hàng</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
    </div>
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