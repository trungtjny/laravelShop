@extends('layouts/admin')
@section('title')
    {{$title}}
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
        <div class="col-8">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 hh-grayBox pt45 pb20">
                    <div class="row justify-content-center">
                        @php
                            $y = 'class= "order-tracking completed"';
                            $n = 'class= "order-tracking"';
                        @endphp
                        <div @php if($order->status >= 0) echo $y; else echo $n; @endphp >
                            <span class="is-complete "></span>
                            <p>Đặt hàng<br><span>{{$order->created_at}}</span></p>
                        </div>
                        <div @php if($order->status >= 1) echo $y; else echo $n; @endphp>
                            <span class="is-complete"></span>
                            <p>Xác nhận<br><span>{{($order->status == 1) ? $order->updated_at : ""}}</span></p>
                        </div>
                        <div @php if($order->status >= 2) echo $y; else echo $n; @endphp>
                            <span class="is-complete"></span>
                            <p>Chuyển tới người vận chuyển<br><span>{{($order->status == 2) ? $order->updated_at : ""}}</span></p>
                        </div>
                        <div @php if($order->status >= 3) echo $y; else echo $n; @endphp>
                            <span class="is-complete"></span>
                            <p>Giao hàng<br><span>{{($order->status == 3) ? $order->updated_at : ""}}</span></p>
                        </div>
                        <div @php if($order->status >= 4) echo $y; else echo $n; @endphp>
                            <span class="is-complete"></span>
                            <p>Hoàn tất<br><span>{{($order->status == 4 || $order->status == 5) ? $order->updated_at : ""}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="">Đơn hàng:</h4>
                            <hr>
                            <h4>Trạng thái: 
                                @switch($order->status)
                                    @case(1)
                                    @php $status = 'Đã xác nhận';@endphp
                                        @break
                                    @case(2)
                                        @php $status = 'Đang nhận hàng';@endphp
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
                                <span class=" text-danger"> {{$status}}</span>
                            </h4>
                            <h4>Người nhận: {{$order->fname." ".$order->lname}}</h4>
                            <h4>Số điện thoại: {{$order->phone}}</h4>
                            <h4>Địa chỉ nhận hàng: {{$order->address}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="">Sản phẩm:</h4>
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
                                    @foreach ($order['orderItems'] as $item)
                                        @if ($item['products']->amount >= $item->quantity)
                                            @php
                                                ($item['products']->active_sale) ? $price = $item['products']->price_sale : $price = $item['products']->price;
                                                $totalPrice += $price*$item->quantity;
                                            @endphp
                                            <tr>
                                                <td><img  src="/uploads/oroducts/{{$item['products']->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px"></td>
                                                <td class="my-auto">{{$item['products']->name}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$price}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                                <div class="  d-flex align-items-center" style="">
                                   <h4> Số tiền cần thanh toán: {{number_format($totalPrice)}}VND</h4>
                                    <input type="number" hidden name="totalPrice" value="{{$totalPrice}}" class="form-control" >
                                </div>
                                <hr>

                                <div class="row mt-3">
                                    @if ($order->status ==1)
                                    <div class="col-6">
                                        <button class="btn btn-danger text-light acceptOrder mr-3" >
                                            Nhận đơn
                                            <input type="hidden" name="order_id" class="order_id" value="{{$order->id}}">
                                        </button>
                                    </div>
                                @else
                                    <div class="order_data  col-6" >
                                        <span>Cập nhật trạng thái:</span>
                                        <input type="hidden" class="order_id" value="{{ $order->id}}">
                                        <select  class="statusOrder" style="border-radius: 10px; padding: 8px" >
                                            {{-- <option value="0" {{ ($order->status == 0) ? 'selected' :""}}>Chưa xác nhận </option>
                                            <option value="1" {{ ($order->status == 1) ? 'selected' :""}}>Đã xác nhận</option>--}}
                                            <option value="2" {{ ($order->status == 2) ? 'selected' :""}}>Đã nhận hàng</option> 
                                            <option value="3" {{ ($order->status == 3) ? 'selected' :""}}>Đang giao hàng</option>
                                            <option value="4" {{ ($order->status == 4) ? 'selected' :""}}>Giao hàng thành công</option>
                                            <option value="5" {{ ($order->status == 5) ? 'selected' :""}}>Giao hàng thất bại</option>
                                        </select>
                                    </div>
                                @endif
                                    <div class="col-6">
                                        <button class="btn btn-warning px-3 float-right" onclick="history.back()"> Quay lại</button>
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
    <style>   
    </style>
@endsection
@section('js')
    <script>     
       
    </script>
@endsection
