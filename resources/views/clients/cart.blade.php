@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-3">
    <div class="bg-light">
            <div class="row ">
                <div class="col-12">
                    <div class="d-flex  align-items-center border-top border-bottom" style="height: 60px">
                        <p class="m-0 ps-2">Trang chủ > </p>
                        <p class="m-0 ps-2"> {{$title}} </p>
                    </div>
                </div>
            </div>
        <div class="">
            <div class="cart">
                <div class="card  mt-3">
                    <div class="card-body">
                        @php
                            $totalPrice =0;
                            $disabled ='';
                        @endphp
                        @if ($cartItem->count())
                            @foreach ($cartItem as $item)
                            @php
                                if($item['products']->active_sale) $price = $item['products']->price_sale;
                                else $price = $item['products']->price;
                            @endphp
                            <div class="row product-data mb-3">
                                <div class="col-1 my-auto">
                                    <img  src="/uploads/{{$item['products']->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px">
                                </div>
                                <div class="col-4 my-auto">
                                    <a href="{{route('productDetail', ['id' => $item['products']->id])}}"><h6 class="text-"> {{$item['products']->name}}</h6></a>
                                </div>  
                                <div class="col-2 my-auto">
                                    <div class="input-group text-center-mb-3">
                                        @if ($item['products']->amount >= $item->quantity)
                                            <button class="input-group-text decrement-btn changeQuantity">-</button>
                                                <input type="text" name='quantity' style=" with: 20%" class="form-control quantity-input text-center px-0" value="{{$item->quantity}}">
                                            <button class="input-group-text increment-btn changeQuantity">+</button>
                                            @php
                                                $totalPrice += $price* $item->quantity;
                                            @endphp
                                        @else <button class="btn btn-secondary rounded-pill">Đã bán hết</button>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-2 my-auto text-center">{{$price}} VND </div>
                                <div class="col-2 text-center my-auto">
                                    <input type="hidden" name="product_id" class="product_id" value="{{$item->product_id}}">
                                    <button class="btn btn-danger btn-delete-cart"> Xoá <i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        @else
                            <h1 class="m-5 text-center">Chưa có sản phẩm trong giỏ hàng</h1> 
                            @php
                                $disabled = "disabled";
                            @endphp
                        @endif
                    </div>
                    <div class="card-footer bg-yellow-100">
                        Tổng cộng: {{$totalPrice}} VND;
                        <a class="btn btn-cart float-end" href="{{route('checkout')}}" >
                            <i class="fa fa-shopping-cart" ></i> Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
@section('sidebar')
@endsection
@section('css')
@endsection
@section('js')
@endsection