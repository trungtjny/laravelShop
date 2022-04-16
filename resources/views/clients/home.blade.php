@extends('layouts/client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
 
    @include('clients.blocks.sidebar')
  
@endsection
@section('content')
  <div class="card" style="min-height: 60vh">
    <div class="card-body">
      <div class="mb-5 banner">
          <div style="width : 100%; ">
          <img class="" style="width : 100%;" src="https://hinh365.com/wp-content/uploads/2020/06/fa7dd4249d6f985f0100dca9e5112ba7.jpg" alt=""></div>
      </div>
      <div class="mb-5">
        <hr>
          <h3 class="text-center">Sản phẩm bán chạy</h3>
          <div class="row">
            @if($products->count())
              @foreach ($products as $item)
              <div class="col-12 col-sm-8 col-md-4 col-lg-3 mt-3">
                <div class="card product-data">
                  
                  <div class="d-flex align-items-center" style="height: 190px">
                    <a href="{{route('productDetail', ['id' => $item->id])}}" >
                      <img class="card-img px-1  " src="/storage/images/products/{{$item->thumb}}" alt="Ảnh sản phẩm">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="card-title overflow-hidden " style="height: 50px">
                      <h6 ><a href="{{route('productDetail', ['id' => $item->id])}}" class="text-decoration-none text-dark">{{$item->name}}</a></h6>
                    </div>
                    <div class="d-flex">
                      <div class="me-auto p-1 ">
                          Đã bán: {{$item->sold}} 
                      </div>
                      <div class="p-1 ">
                          Còn lại: {{$item->amount}} 
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="price text-success"><h5 class="mt-4">{{number_format(($item->active_sale == 0) ? $item->price :$item->price_sale)}}đ</h5></div>
                      <input type="hidden" name='quantity'  class="form-control quantity-input" value="1">
                      <input type="hidden" name="product_id" class="product_id" value="{{$item->id}}">
                      <button class="btn btn-danger mt-3 addToCart-btn"><i class="fas fa-shopping-cart"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @else <h5 class="m-3">Không tìm thấy sản phẩm phù hợp</h5>  
            @endif
          </div> 
      </div>
      <div class="mb-5">
        <hr>
        <h3 class="text-center">Về chúng tôi</h3>
        <div class="row text-center my-3">
          <div class="col-sm-4 ">
            <span style="font-size: 50px; color: #000" class="" >
              <i class="fas fa-snowflake-o " aria-hidden="true"></i>
            </span>
            <h4 class="">Cam kết chất lượng</h4>
            <p >Chúng tôi cung cấp sản phẩm có nguyên liệu nhựa an toàn, không độc tố và các linh kiện điện tử chất lượng cao nhất</p>
          </div>
          <div class="col-sm-4 ">
            <span style="font-size: 50px; color: #000" class="" >
              <i class="fas fa-snowflake-o " aria-hidden="true"></i>
            </span>
            <h4 >Sản phẩm chính hãng</h4>
            <p >Các sản phẩm cửa hàng bày bán đều là hàng chính hãng, rõ nguồn gốc xuất sứ và đã qua kiểm định an toàn.</p>
          </div>
          <div class="col-sm-4">
            <span style="font-size: 50px; color: #000" class="" >
              <i class="fas fa-snowflake-o " aria-hidden="true"></i>
            </span>
            <h4 >Giao hàng hoả tốc</h4>
            <p >Đơn đặt hàng của bạn sẽ được xác nhận và giao hàng nhanh chóng trong vòng 1 đến 4 ngày</p>
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
