@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-5">

    <div class="card">
        <div class="row ">
            <div class="col-12">
                <div class="d-flex  align-items-center border-top border-bottom bg-secondary text-white" style="height: 60px">
                    <p class="m-0 ps-2">Trang chủ > </p>
                    <p class="m-0 ps-2">Sản phẩm > </p>
                    <p class="m-0 ps-2"> {{$title}} sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4>Thông tin nhận hàng:</h4>
                    <form action="{{route('update_order')}}" method="POST">
                        @csrf
                        <div class="col-8 mb-3">
                            <label for="fname"><h6>Họ-tên đệm:</h6></label>
                            <input type="text" class="form-control" name="fname" id="fname" value="{{$order->fname}}">
                            <input type="text" class="form-control" name="id" id="id" value="{{$order->id}} " hidden>
                        </div>
                        <div class="col-8 mb-3">
                            <label for="lname"><h6>Tên:</h6></label>
                            <input type="text" name="lname" class="form-control" id="lname" value="{{$order->lname}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="phone"><h6>Số điện thoại</h6></label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{$order->phone}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="city"><h6>Thành phố</h6></label>
                            <input type="text"  name="city" class="form-control" id="city" value="{{$order->city}}">
                        </div>
                        <div class="col-8 mb-3">
                            <label for="address"><h6>Địa chỉ nhận hàng</h6></label>
                            <input type="text" name="address" class="form-control" id="address" value="{{$order->address}}">
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
                                @case(6)
                                    @php $status = 'Đơn huỷ';@endphp
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
                            <i>(Lưu ý: Chỉ có thể thay đổi thông tin đơn hàng trong trạng thái chưa xác nhận, nếu cần thay đổi thông tin quý khách liên hệ tổng đài 1234567890 để được hỗ trợ)</i>
                        </div>
                        <div class="">
                            @if ($order->status == 0)
                            <button type="submit" class="btn btn-warning px-5" id="btn-update-order" >Cập nhật</button>
                            <button type="button" class="btn btn-danger  mx-5 px-5" id="btn-remove-order"  >Huỷ đơn</button>
                            @endif
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
                                            <th>Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalprice=0;
                                            
                                        @endphp
                                        @foreach ($order->orderItems as $item)
                                            @if ( $item->quantity)
                                                @php
                                                    ($item->products->active_sale) ? $price = $item->products->price_sale : $price = $item->products->price;
                                                    $totalprice += $price*$item->quantity;
                                                @endphp
                                                <tr>
                                                    <td><img  src="/uploads/products/{{$item->products->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px"></td>
                                                    <td class="my-auto">{{$item->products->name}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{number_format($price)}}đ</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6  d-flex align-items-center" style="">
                                        Số tiền cần thanh toán: {{number_format($totalprice)}}VNĐ
                                        <input type="number" hidden name="totalprice" value="{{$totalprice}}" class="form-control" >
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