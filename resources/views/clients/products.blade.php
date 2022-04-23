@extends('layouts/client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @include('clients.blocks.sidebar')
@endsection
@section('content')

<section class="mt-5">
  <div class="bg-light p-3">
    <div class="sort mt-3 ms-3  ">
      <div class="sort-list">
        <span class="" >Sắp xếp:</span>
        <select name="sort" id="sort">
          <option value="">Sắp xếp theo</option>
          <option value="gia-tang">Giá tăng dần</option>
          <option value="gia-giam">Giá giảm dần</option>
          <option value="dang_khuyen-mai">Đang khuyến mãi</option>
          <option value="san-pham-moi">Mới nhất</option>
        </select>
      </div>
      <div class="category d-block d-lg-none">
        <span class="">Danh mục:</span>
        <select name="category" id="category"  >
              <option value=""> Chọn danh mục</option>
              @php
              $html ='';
              $sub ='|---';$selected ='';
              foreach($category as $key => $item){
                  if($item->parent_id == 0){
                      if(Request::query('category') && Request::query('category') == $item->id) $selected ='selected';
                      else $selected = '';
                      $html .= '<option value="'.$item->id.'"'.$selected  .'> '.$item->name.'</option>';
                      $id = $item->id;
                      foreach($category as $key => $item){
                          if($item->parent_id == $id){
                            if(Request::query('category') && Request::query('category') == $item->id) $selected ='selected';
                      else $selected = '';
                            $html .= '<option value="'.$item->id.'"'.$selected  .'> '.$sub.$item->name.'</option>';
                          }                     
                      }
                  }
              }
              echo $html; 
              @endphp
        </select>
      </div>
  </div>
  <hr>
  <div class="row  gx-3 gy-5">
    @if($products->count())
    @foreach ($products as $item)
      <div class="col-lg-3 col-6   ">
        <div class="product-item p-2 border d-flex  flex-column" style="height: 100%">
            <div class="my-auto  bg-white">
              <a href="{{route('productDetail', ['id' => $item->id])}}" >
                <img src="/storage/images/products/{{$item->thumb}}" alt="" class="img-fluid">
              </a>
            </div>
            <div class="">
                <a href="{{route('productDetail', ['id' => $item->id])}}" class="link-dark">
                    <h6>{{$item->name}}</h6>
                </a>
                <p>Đã bán: {{$item->sold}}</p>
                <div class="d-flex flex-row justify-content-between align-items-center border-top  pt-2 ">
                  <h6 class="text-bold  ">{{number_format(($item->active_sale == 0) ? $item->price :$item->price_sale)}}đ</h6>
                  <button class="button button-rv px-4 py-1 addToCart-btn"><i class="fas fa-shopping-cart"></i> </button>
              </div>
            </div>
        </div>
      </div>
      @endforeach
          @else <h5 class="mx-3 my-5">Không tìm thấy sản phẩm phù hợp</h5>  
          @endif
  </div>
  <div class="d-flex mt-3">
    <div class="mx-auto">
        {{ $products->links(); }}
    </div>
  </div>
  </div>
  
</section>
{{--  <span>
                  <label for="amount" >Giá bán :</label>
                  <input type="text" id="amount" readonly style="border:0; color:red; font-weight:bold;" >
                </span>
                <div id="slider-range" class="d-inline-block"  style="width:200px"></div> 
                <button class="btn btn-primary float-end me-4 ">TÌm kiếm</button>
                @if (Request::query('category') || Request::query('keyword'))
                <a href="{{route('products')}}" class="btn btn-success me-3 float-end">Clear</a>
                @endif--}}
{{-- <div class="card" style="min-height: 60vh">
  <div class="card-body">
    <div class="mx-3">
        <h3 class="text-center">Sản phẩm</h3>
        <form class=" " action="" method="GET">
               
          
          <div class="row">
            <div class="col-12 d-flex flex-row flex-wrap">
              <div class="">
                <span class="">Sắp xếp:</span>
                <select name="sort" id="sort">
                  <option value="">Sắp xếp theo</option>
                  <option value="gia-tang">Giá tăng dần</option>
                  <option value="gia-giam">Giá giảm dần</option>
                  <option value="dang_khuyen-mai">Đang khuyến mãi</option>
                  <option value="san-pham-moi">Mới nhất</option>
                </select>
              </div>
              <div class="ml-5 d-block d-lg-none">
                <span class="">Danh mục:</span>
                <select name="category" id="category"  >
                      <option value=""> Chọn danh mục</option>
                      @php
                      $html ='';
                      $sub ='|---';$selected ='';
                      foreach($category as $key => $item){
                          if($item->parent_id == 0){
                              if(Request::query('category') && Request::query('category') == $item->id) $selected ='selected';
                              else $selected = '';
                              $html .= '<option value="'.$item->id.'"'.$selected  .'> '.$item->name.'</option>';
                              $id = $item->id;
                              foreach($category as $key => $item){
                                  if($item->parent_id == $id){
                                    if(Request::query('category') && Request::query('category') == $item->id) $selected ='selected';
                              else $selected = '';
                                    $html .= '<option value="'.$item->id.'"'.$selected  .'> '.$sub.$item->name.'</option>';
                                  }                     
                              }
                          }
                      }
                      echo $html; 
                      @endphp
                </select>
              </div>
            </div>
          </div>      
       </form> 
     
        <hr>
        <div class="row">
          @if($products->count())
            @foreach ($products as $item)
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-3">
              <div class="card product-data">
                
                <div class="d-flex align-items-center" style="height: 290px">
                  <a href="{{route('productDetail', ['id' => $item->id])}}" >
                    <img class="card-img px-1  " src="/storage/images/products/{{$item->thumb}}" alt="Ảnh sản phẩm">
                  </a>
                </div>
                <div class="card-body">
                  <div class="card-title overflow-hidden " style="height: 40px">
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
        
        <div class="d-flex mt-3">
          <div class="mx-auto">
              {{ $products->links(); }}
          </div>
        </div>
    </div>
  </div>
</div> --}}
@endsection
@section('css')
  <style>

 
  </style>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#slider-range" ).slider({
    orientation: "horizontal",
    range: true,
    min: 10000,
    max: 1000000,
    steps: 10000,
    values: [ 10000, 1000000 ],
    slide: function( event, ui ) {
      $( "#amount" ).val(new Intl.NumberFormat().format(ui.values[ 0 ])   + "đ" + " - " + new Intl.NumberFormat().format(ui.values[ 1 ]) + "đ" );
    }
  });
  $( "#amount" ).val(  new Intl.NumberFormat().format($( "#slider-range" ).slider( "values", 0 ))  + "đ - " +
  new Intl.NumberFormat().format($( "#slider-range" ).slider( "values", 1 )) +"đ"  );
} );
</script>
@endsection