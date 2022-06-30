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
              <a class="button button-lg mt-5" href="{{route('products')}}">Mua sắm</a>
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
                          <img src="/uploads/layouts/slider1.png" alt="Slider1" class="img-fluid">
                      </div>
                      <div class="col-lg-4">
                          <img src="/uploads/layouts/slider2.png" alt="Slider2" class="img-fluid">
                      </div>
                      <div class="col-lg-4">
                          <img src="/uploads/layouts/slider3.png" alt="Slider3" class="img-fluid">
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </div>
    </section>
    <section class="trending ">
      <div class="container ">
          <div class="trending-container py-5 px-3 bg-light">
            <div class="row mb-3">
              <div class="col-lg-5 m-auto text-center">
                  <h1>Sản phẩm nổi bật</h1>
                  <hr>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-8 m-auto">
                <div class="row gy-3">
                  @if($products->count())
                  @foreach ($products as $item)
                    <div class="col-lg-4 col-6  ">
                        <div class="d-flex flex-column trending-item p-3 h-100 border" >
                          <div class=" bg-light  my-auto">
                            <a href="{{route('productDetail', ['id' => $item->id])}}" >
                              <img src="/uploads/products/{{$item->thumb}}" alt="" class="img-fluid m-auto">
                            </a>
                          </div>
                          <div class="pt-3 text-center">
                              <a href="" class="link-dark">
                                  <h6><a href="{{route('productDetail', ['id' => $item->id])}}" class="text-decoration-none text-dark">{{$item->name}}</a></h6>
                              </a>
                              <h6 class="text-bold mt-3">{{number_format(($item->active_sale == 0) ? $item->price :$item->price_sale)}}vnđ</h6>
                          </div>
                        </div>
                    </div>
                  @endforeach
                  @else <h5 class="m-3">Không tìm thấy sản phẩm phù hợp</h5>  
                @endif
                </div>
              </div>
            </div>
            <div class="row mt-5 py-2">
                <div class="col-6-lg m-auto text-center">
                    <a href="./products?sort=ban-chay-nhat" class="button button-rv px-4 py-2">Xem thêm</a>
                </div>
            </div>
          </div>
      </div>
    </section>
    <div class="container py-5 ">
      <h3 class="text-center">Về chúng tôi</h3>
      <div class="row text-center   mt-5">
        <div class="col-8 m-auto">
          <div class="row">
            <div class="col-sm-4 col-12">
              <span style="font-size: 50px; color: #000" class="" >
                <i class="fa fa-star" aria-hidden="true"></i>
              </span>
              <h4 class="">Cam kết chất lượng</h4>
              <p >Chúng tôi cung cấp sản phẩm có nguyên liệu nhựa an toàn, không gây hại.</p>
            </div>
            <div class="col-sm-4 ">
              <span style="font-size: 50px; color: #000" class="" >
                <i class="fa fa-handshake-o" aria-hidden="true"></i>
              </span>
              <h4 >Sản phẩm chính hãng</h4>
              <p >Các sản phẩm cửa hàng bày bán đều là hàng chính hãng.</p>
            </div>
            <div class="col-sm-4">
              <span style="font-size: 50px; color: #000" class="" >
                <i class="fa fa-truck" aria-hidden="true"></i>
              </span>
              <h4 >Giao hàng hoả tốc</h4>
              <p >Đơn đặt hàng của bạn sẽ được xác nhận và giao hàng nhanh.</p>
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
