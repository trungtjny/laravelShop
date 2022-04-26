@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="cart-header bg-warning py-2">
            <h5 class="m-1 px-2 text-dark"><a class="text-dark" href="{{route('home')}}">Trang chủ</a> / <a class="text-dark" href="{{route('cart')}}">Đơn mua </a>/ chi tiết</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4>Thông tin nhận hàng:</h4>
                    <form action="">
                        @csrf
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Họ-tên đệm:</h6></label>
                            <input type="text" class="form-control" value="{{$order->fname}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Tên:</h6></label>
                            <input type="text" class="form-control" value="{{$order->lname}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Số điện thoại</h6></label>
                            <input type="text" class="form-control" value="{{$order->phone}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Thành phố</h6></label>
                            <input type="text" class="form-control" value="{{$order->city}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Địa chỉ nhận hàng</h6></label>
                            <input type="text" class="form-control" value="{{$order->address}}">
                        </div>
                        <div class="">
                            @switch($order->status)
                                @case(1)
                                @php $status = 'Đã xác nhận';@endphp
                                    @break
                                @case(2)
                                    @php $status = 'Vận chuyển';@endphp
                                    @break
                                @case(3)
                                    @php $status = 'Đang giao hàng';@endphp
                                    @break
                                @case(4)
                                        @php $status = 'Giao hàng thành công';@endphp
                                    @break
                                @case(5)
                                        @php $status = 'Giao hàng thất bại';@endphp
                                    @break
                                @default
                                    @php $status = 'Chưa xác nhận'; @endphp
                            @endswitch
                                <h5 class="text-decoration-underline text-danger">Trạng thái đơn hàng: {{$status}}</h5>
                        </div>
                        @php
                            if($order->status == 0) $disabled = ''; else $disabled = "disable";  
                        @endphp
                        <div class="mb-3">
                            <i>(Lưu ý: Chỉ có thể thay đổi thông tin đơn hàng trong trạng thái chưa xác nhận, nếu cần thay đổi thông tin quý khách liên hệ tổng đài 1000011 để được hỗ trợ)</i>
                        </div>
                        <div class="">
                            <button class="btn btn-warning px-5" {{$disabled}}>Cập nhật</button>
                            <button class="btn btn-danger  mx-5 px-5" {{$disabled}} >Xoá</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col-6">
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="">Đơn hàng:</h4>
                                <hr>
                                <table class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice=0;
                                            
                                        @endphp
                                        @foreach ($order->orderItems as $item)
                                            @if ($item->products->amount >= $item->quantity)
                                                @php
                                                    ($item->products->active_sale) ? $price = $item->products->price_sale : $price = $item->products->price;
                                                    $totalPrice += $price*$item->quantity;
                                                @endphp
                                                <tr>
                                                    <td><img  src="/uploads/{{$item->products->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px"></td>
                                                    <td class="my-auto">{{$item->products->name}}</td>
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
                                        Số tiền cần thanh toán: {{number_format($totalPrice)}}VND
                                        <input type="number" hidden name="totalPrice" value="{{$totalPrice}}" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
   
@endsection
@section('js')
    <script>
      
    </script>
@endsection