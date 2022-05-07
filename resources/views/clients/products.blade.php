@extends('layouts/client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @include('clients.blocks.sidebar')
@endsection
@section('content')
<section class="">
  <div class="bg-light p-3">
    <div class="sort mt-3 ms-3  ">
      <div class="sort-list">
          <form action="">
            @csrf
          <span class="" >Sắp xếp:</span>
          <select name="sort" id="sort">
            {{-- <option value="{{Request::url()}}?sort=0">Sắp xếp theo</option> --}}
            <option value="0" {{( Request::query('sort') == '0') ? 'selected':""}}>Sắp xếp theo</option>
            <option value="gia-tang" {{( Request::query('sort') == 'gia-tang') ? 'selected':""}}>Giá tăng dần</option>
            <option value="gia-giam" {{( Request::query('sort') == 'gia-giam') ? 'selected':""}}>Giá giảm dần</option>
            <option value="dang-khuyen-mai" {{( Request::query('sort') == 'dang-khuyen-mai') ? 'selected':""}}>Đang khuyến mãi</option>
            <option value="san-pham-moi" {{( Request::query('sort') == 'san-pham-moi') ? 'selected':""}}>Mới nhất</option>
            <option value="ban-chay-nhat" {{( Request::query('sort') == 'ban-chay-nhat') ? 'selected':""}}>Sản phẩm bán chạy</option>
          </select>
        </form>
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
        <div class="product-item p-2 border d-flex  flex-column product-data" style="height: 100%">
            <div class="mb-auto  bg-white">
              <a href="{{route('productDetail', ['id' => $item->id])}}" >
                <img src="/uploads/products/{{$item->thumb}}" alt="" class="img-fluid">
              </a>
            </div>
            <div class="mt-3">
                <a href="{{route('productDetail', ['id' => $item->id])}}" class="link-dark">
                    <h6>{{$item->name}}</h6>
                </a>
                <p>Đã bán: {{$item->sold}}</p>
                
                <div class="d-flex flex-row justify-content-between align-items-center border-top  pt-2 ">
                  <h6 class="text-bold  ">{{number_format(($item->active_sale == 0) ? $item->price :$item->price_sale)}}đ</h6>
                  <input type="hidden" name="product_id" class="product_id" value="{{$item->id}}">
                                    <br>
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

@endsection
@section('css')
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$( function() {
  var min_price = 0;
  var max_price = 1000000;
  $("#amount-begin").val(min_price);
  $("#amount-end").val(max_price);
      let queryString = window.location.search;
      let urlParams = new URLSearchParams(queryString);
      if (urlParams.has('min')) x = parseInt(urlParams.get("min")); else x= min_price;
      if (urlParams.has('max')) y = parseInt(urlParams.get("max")); else y= max_price;
     /*  $( "#amount" ).val("Giá :" + new Intl.NumberFormat().format(  x)   + "đ" + " - " + new Intl.NumberFormat().format(y) + "đ" ); */  
  $( "#slider-range" ).slider({
    orientation: "horizontal",
    range: true,
    min: min_price,
    max: max_price,
    steps: 10000,
    values: [  x,  y ],
    slide: function( event, ui ) {
      $( "#amount" ).val("Giá :" + new Intl.NumberFormat().format(ui.values[ 0 ] )   + "đ" + " - " + new Intl.NumberFormat().format(ui.values[ 1 ] ) + "đ" );
      $("#amount-begin").val(ui.values[ 0 ]);
      $("#amount-end").val(ui.values[ 1 ]);
    }
  });
  $( "#amount" ).val( "Giá :" +  new Intl.NumberFormat().format($( "#slider-range" ).slider( "values", 0 ))  + "đ - " +
  new Intl.NumberFormat().format($( "#slider-range" ).slider( "values", 1 )) +"đ"  );
  
} );

</script>
@endsection