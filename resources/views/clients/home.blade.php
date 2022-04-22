@extends('layouts.clientFull')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @include('clients.blocks.sidebar')
@endsection
@section('content')
    <section class="banner mt-1">
      <div class="container">
          <div class="main main-home d-flex flex-column justify-content-center align-items-center">
              <h1 class="title">Sản phẩm đồ chơi an toàn cho bé!</h1>
              <a class="button button-lg mt-5">Mua sắm</a>
          </div>
      </div>
    </section>
    <section class="category ">
      <div class="container  ">
          <div class="bg-light ">
            <div class="row ">
              <div class="col-lg-8 m-auto">
                  <div class="row text-center gx-4">
                      <div class="col-lg-4">
                          <img src="/assets/clients/image/car.png" alt="" class="img-fluid">
                      </div>
                      <div class="col-lg-4">
                          <img src="/assets/clients/image/plant.png" alt="" class="img-fluid">

                      </div>
                      <div class="col-lg-4">
                          <img src="/assets/clients/image/box.png" alt="" class="img-fluid">
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </div>
    </section>
    <section class="trending ">
      <div class="container ">
          <div class="trending-container py-5 bg-light">
            <div class="row mb-3">
              <div class="col-lg-5 m-auto text-center">
                  <h1>Sản phẩm nổi bật</h1>
                  <hr>
              </div>
          </div>
          <div class="row">
            @if($products->count())
              @foreach ($products as $item)
                <div class="col-lg-3 col-6  ">
                    <div class="d-flex flex-column trending-item p-3 h-100" >
                      <div class="border-0 bg-light  my-auto">
                        <a href="{{route('productDetail', ['id' => $item->id])}}" >
                          <img src="/storage/images/products/{{$item->thumb}}" alt="" class="img-fluid m-auto">
                        </a>
                      </div>
                      <div class="pt-3 text-center">
                          <a href="" class="link-dark">
                              <h5><a href="{{route('productDetail', ['id' => $item->id])}}" class="text-decoration-none text-dark">{{$item->name}}</a></h5>
                          </a>
                          <h5 class="text-bold mt-3">{{number_format(($item->active_sale == 0) ? $item->price :$item->price_sale)}}vnđ</h5>
                      </div>
                    </div>
                </div>
              @endforeach
              @else <h5 class="m-3">Không tìm thấy sản phẩm phù hợp</h5>  
              @endif
          </div>
          <div class="row mt-5 py-2">
              <div class="col-6-lg m-auto text-center">
                  <a class="button button-rv px-4 py-2">Xem thêm</a>
              </div>
          </div>
          </div>
      </div>
    </section>
    <div class="container py-5 ">
      <h3 class="text-center">Về chúng tôi</h3>
      <div class="row text-center ">
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
      {{-- 
            @if($products->count())
              @foreach ($products as $item)
              <div class="col-12 col-sm-8 col-md-4 col-lg-3 mt-3">
                <div class="card product-data">
                  <div class="d-flex align-items-center" style="height: 300px">
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
            @endif --}}
        
@endsection

@section('css')
    <style>
       
    </style>
@endsection
@section('js')
    <script>
        
    </script>
@endsection
