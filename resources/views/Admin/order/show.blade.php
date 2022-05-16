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
        <div class="col-12">
            <div class="card-body m-3">
                <div class="row ">
                   <div class="col-lg-8 col-12 border border-secondary">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 hh-grayBox pt45 pb20">
                                <div class="row justify-content-center">
                                    @php
                                        $y = 'class= "order-tracking completed"';
                                        $n = 'class= "order-tracking"';
                                    @endphp
                                    @if ($order->status !=6){
                                        <div @php if($order->status >= 0 && $order->status != 6) echo $y; else echo $n; @endphp >
                                            <span class="is-complete "></span>
                                            <p>Đặt hàng<br><span>{{$order->created_at}}</span></p>
                                        </div>
                                        <div @php if($order->status >= 1 && $order->status != 6) echo $y; else echo $n; @endphp>
                                            <span class="is-complete"></span>
                                            <p>Xác nhận<br><span>{{($order->status == 1) ? $order->updated_at : ""}}</span></p>
                                        </div>
                                        <div @php if($order->status >= 2 && $order->status != 6) echo $y; else echo $n; @endphp>
                                            <span class="is-complete"></span>
                                            <p>Chuyển tới người vận chuyển<br><span>{{($order->status == 2) ? $order->updated_at : ""}}</span></p>
                                        </div>
                                        <div @php if($order->status >= 3 && $order->status != 6) echo $y; else echo $n; @endphp>
                                            <span class="is-complete"></span>
                                            <p>Giao hàng<br><span>{{($order->status == 3) ? $order->updated_at : ""}}</span></p>
                                        </div>
                                        <div @php if($order->status >= 4 && $order->status != 6) echo $y; else echo $n; @endphp>
                                            <span class="is-complete"></span>
                                            <p>Hoàn tất<br><span>{{($order->status == 4 || $order->status == 5) ? $order->updated_at : ""}}</span></p>
                                        </div>
                                    }
                                    @else <h4 class="text-danger"> Đơn hàng đã bị huỷ - thời gian: {{$order->updated_at}}</h4>    
                                    @endif
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row ">
                            <div class="col-5">
                                <div class="p-3">
                                    <h4>Thông tin nhận hàng:  </h4>
                                    <h5 class="mb-3">Email người nhận: {{$order['orderUser']->email}}</h5>
                                    
                                        <h5 class="mb-3">Họ tên: {{$order->fname." ".$order->lname}} </h5>
                                        <h5 class="mb-3">Số điện thoại: {{$order->phone}}</h5>
                                        <h5 class="mb-3">Thành phố: {{$order->city}}</h5>
                                        <h5 class="mb-3">Địa chỉ nhận hàng: {{$order->address}}</h5>
                                    @if ($order->status==0)
                                        <div class="col-10-mb-3">
                                            <input type="hidden" id="order_id" value="{{ $order->id}}">
                                            <button class="btn btn-success mt-5" id="confirmOrder">Xác nhận đơn hàng</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card m-3">
                                    <div class="card-body">
                                        <h4 class="">Đơn hàng:</h4>
                                        <hr>
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th class="text-center" style="width:100px">Số lượng</th>
                                                    <th   style="width:150px">Giá</th>
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
                                                            <td><img  src="/uploads/products/{{$item['products']->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px"></td>
                                                            <td class="my-auto">{{$item['products']->name}}</td>
                                                            <td class="text-center" >{{$item->quantity}}</td>
                                                            <td >{{number_format($price)." "}} VND</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer ">
                                            <div class="  d-flex align-items-center" style="">
                                                <h5> Số tiền cần thanh toán: {{number_format($totalPrice)}}VND</h5>
                                                <input type="number" hidden name="totalPrice" value="{{$totalPrice}}" class="form-control" >
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                        <div class="col-lg-4 col-12 ">
                            <div class="card">
                                <div class="card-body border border-secondary">
                                    <h4 class="">Thông tin tài xế:</h4>
                                    <hr>
                                    @if (empty($shipper))
                                        <i><h4>"Không có người giao hàng"</h4></i>
                                    @else
                                    <h5 class="my-3">Tài khoản: {{$shipper['orderShip']->email}}</h5>
                                    <h5 class="my-3">Họ tên: {{$shipper['orderShip']->fname." ".$shipper['orderShip']->lname}}</h5>
                                    <h5 class="my-3">Số điện thoại: {{$shipper['orderShip']->phone}} </h5>
                                    @endif
                                    
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
