@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container  ">
    <div class="card  mt-3">
        <div class="cart-header bg-warning py-2">
            <h5 class="m-1 px-2"><a class="text-dark" href="{{route('home')}}">Trang chủ</a> / <a class="text-dark" href="{{route('cart')}}">Giỏ hàng</a></h5>
        </div>
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
                    <div class="col-2 my-auto">
                        <img  src="/uploads/{{$item['products']->thumb}}" alt="Ảnh sản phẩm" width="70px" height="70px">
                    </div>
                    <div class="col-4 my-auto">
                        <h4 class="text-"> {{$item['products']->name}}</h4>
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
            <button class="btn btn-outline-success float-end" {{$disabled}}>
                <a href="{{route('checkout')}}" style="text-decoration : none; " ><i class="fa fa-shopping-cart" style="color: #FF4500"></i> Thanh toán</a>
            </button>
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
    <script>
      
    </script>
@endsection