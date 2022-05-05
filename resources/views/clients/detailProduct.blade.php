@extends('layouts/clientFull')
@section('title')
    {{$title." : ".$item->name}}
@endsection
@section('content')
    <div class="container mt-3">
        <div class="bg-light">
            <div class="">
                <div class="row ">
                    <div class="col-12">
                        <div class="d-flex  align-items-center border-top border-bottom" style="height: 60px">
                            <p class="m-0 ps-2">Trang chủ > </p>
                            <p class="m-0 ps-2">Sản phẩm > </p>
                            <p class="m-0 ps-2"> {{$title}} sản phẩm</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" product-data mt-3 ">
               <div class="border p-3">
                    <div class="mt-5 ">
                        <div class="row gx-5">
                            <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid" src="/uploads/{{$item->thumb}}" alt="Ảnh sản phẩm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-12">
                                <div class="">
                                    <h5 class="">{{$item->name}} {{$item->category->parent_id}}</h5>
                                    <hr>
                                    <div class="overflow-hidden d-none d-lg-block" style="height: 220px">
                                        <p class=""  >
                                            @php
                                                $txt='';
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
                    <div class="mt-5">
                        <h4>Mô tả sản phẩm</h4>
                        <hr>
                        @php
                        echo html_entity_decode( $item->description);
                        echo html_entity_decode( $item->product_content);
                        @endphp
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
    <script>
      
    </script>
@endsection