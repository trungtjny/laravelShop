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
            <form class="form-inline ml-5" action="" method="GET">
                      <label for="category-filter" class="d-flex justify-content-end pr-0 ">Lọc theo danh mục:</label> 
                      <select name="category" id="category" class="form-control ml-2 " style="display: inline">
                          <option value=""> Chọn danh mục</option>
                          @php
                          $html ='';
                          $sub ='|---';$selected ='';
                          foreach($categories as $key => $item){
                              if($item->parent_id == 0){
                                  if(Request::query('category') && Request::query('category') == $item->id) $selected ='selected';
                                  else $selected = '';
                                  $html .= '<option value="'.$item->id.'"'.$selected  .'> '.$item->name.'</option>';
                                  $id = $item->id;
                                  foreach($categories as $key => $item){
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
                      <input type="text" name="keyword" value="{{Request::query('keyword')}}" class="form-control ml-2" placeholder="Từ khoá tìm kiếm">
                      <span></span>
                        <button class="btn btn-primary ml-5">Search</button>
                        @if (Request::query('category') || Request::query('keyword'))
                            <a href="{{route('admin.products')}}" class="btn btn-success ml-3">Clear</a>
                        @endif
                        
            </form>   
            {{-- <div class="d-flex justify-content-end">
                <a href="{{route('admin.products.create')}}"  class="btn btn-info ml-3 " >Thêm sản phẩm</a>
            </div> --}}

      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col" style="width: 50px">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Đã bán</th>
            <th scope="col">Giá</th>
            <th scope="col">Giá khuyến mãi</th>
            <th scope="col">Khuyến mãi</th>
            <th scope="col">Đăng bán</th>
            <th scope="col" class="table-primary" style="width: 250px">Tuỳ chọn</th>
          </tr>
        </thead>
        <tbody >
            @php $i=0; @endphp
            @if (count($products))
                @foreach ($products as $item)
                <tr >
                <td class="align-middle">{{++$i }}</td>
                <td class="align-middle"><b>{{ $item->name }}</b></td>
                <td>
                    <img src="/storage/images/products/{{$item->thumb}}" style="width: 100px" alt="">
                </td>
                <td class="align-middle">{{ $item->amount}}</td>
                <td class="align-middle">{{ $item->sold}}</td>
                <td class="align-middle">{{ $item->price}}</td>
                <td class="align-middle">{{ $item->price_sale}}</td>
                <td class="align-middle" >{{-- {{ $item->active_sale}} --}}
                    @if ( $item->active_sale)
                        <button class="btn btn-success" onclick="setActive_sale( {{ $item->id}}, {{ $item->active_sale}} )" >Bật</button>
                    @else    
                        <button class="btn btn-danger" onclick="setActive_sale( {{ $item->id}}, {{ $item->active_sale}})" >Tắt</button>
                    @endif
                </td>
                <td class="align-middle">
                    @if ( $item->active)
                        <button class="btn btn-success" onclick="setActive( {{ $item->id}}, {{$item->active}} )" >Đang bán</button>
                    @else    
                        <button class="btn btn-danger" onclick="setActive( {{ $item->id}}, {{ $item->active}})" >Tạm ẩn</button>
                    @endif
                </td>
                <td class="table-primary align-middle">
                    <a href="{{route('admin.products').'/edit/'.$item->id}}" class="btn btn-warning btn-sm mx-2">
                    <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="#" class="btn btn-danger btn-sm mx-2" onclick="removeProducts('{{$item->id}}','{{route('admin.products.destroy')}}')">
                    <i class="fas fa-trash-alt"></i> Xoá
                    </a>
                </td>
                </tr>
                @endforeach
            @else
                <td colspan="6"><h3>Không tìm thấy sản phẩm</h3></td>   
            @endif
        </tbody>
      </table>
      <div class="d-flex">
        <div class="mx-auto">
            {{ $products->links(); }}
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
