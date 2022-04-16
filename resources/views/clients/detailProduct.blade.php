@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
    
        <div class="container card product-data mt-3">
            <div class="cart-header">
                <h4 class="m-3">Sản phẩm: {{$item->category->name}} / {{$item->name}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-img" src="/storage/images/products/{{$item->thumb}}" alt="Ảnh sản phẩm">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="">{{$item->name}} {{$item->category->parent_id}}</h3>
                                <hr>
                                <div class="overflow-hidden"style="height: 220px">
                                    <p class=""  >
                                        @php
                                           echo html_entity_decode( $item->description);
                                        @endphp
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-decoration-line-through"></h5>
                                    @php
                                        if($item->active_sale)  $txt = '<h5 class ="d-inline me-3">Giá: '.number_format($item->price_sale).'đ</h5>'.'<h5 class="d-inline text-decoration-line-through"> '  .number_format($item->price).'đ</h5>';
                                        echo $txt;
                                    @endphp 
                                </div>
                                <div class="d-flex">
                                    
                                    <div class="me-5  ">
                                       <h5> Đã bán: {{$item->sold}} </h5>
                                    </div>
                                    <div class=" ">
                                       <h5> Còn lại: {{$item->amount}} </h5>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-3">
                                        <label for="quantity">Số lượng:</label>
                                        <div class="input-group text-center-mb-3">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" name='quantity'  class="form-control quantity-input" value="1">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <input type="hidden" name="product_id" class="product_id" value="{{$item->id}}">
                                        <br>
                                        <button class="btn btn-success addToCart-btn">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4>Mô tả sản phẩm</h4>
                <hr>
                @php
                echo html_entity_decode( $item->description);
                echo html_entity_decode( $item->product_content);
                @endphp
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