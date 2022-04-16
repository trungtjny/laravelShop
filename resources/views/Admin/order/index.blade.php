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
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.products.create')}}"  class="btn btn-info ml-3 " >Thêm sản phẩm</a>
                {{-- <a href="./"  class="btn btn-info ml-3 " >Thêm sản phẩm</a> --}}
            </div>
      <table class="table ">
        <thead>
          <tr>
            <th scope="col" style="width: 50px">STT</th>
            <th scope="col">Tài khoản</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Nơi nhận</th>
            <th scope="col">Tổng hoá đơn</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thời gian</th>
            <th scope="col" style="width: 150px">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @if (count($orders))
                @foreach ($orders as $item)
                <tr>
                <td>{{++$i }}</td>
                <td>{{ $item['orderUser']->email }}</td>
                <td>{{ $item->phone}}</td>
                <td>{{ $item->city}}</td>
                <td>{{ $item->totalPrice}}</td>
                <td>
                    
                    @switch($item->status)
                    @case(1)
                    @php $status = 'Đã xác nhận';@endphp
                        @break
                    @case(2)
                        @php $status = 'Đang nhận hàng';@endphp
                        @break
                    @case(3)
                        @php $status = 'Đang giao hàng';@endphp
                        @break
                    @case(4)
                            @php $status = 'Giao hàng thành công';@endphp
                        @break
                    @case(5)
                            @php $status = 'Giao hàng thất bại';@endphp
                        @break
                    @default
                        @php $status = 'Chưa xác nhận'; @endphp
                @endswitch
                    <h5 class=" text-danger"> {{$status}}</h5>
                </td>
                <td>{{ $item->created_at}}</td>
                <td>
                    <a href="{{route('admin.order.show', ['id' => $item->id])}}" class="btn btn-warning btn-sm mx-2">
                    <i class="far fa-edit"> Xem </i>
                    </a>
                </td>
                </tr>
                @endforeach
            @else
                <td colspan="6"><h3>Không có đơn hàng nào</h3></td>   
            @endif
        </tbody>
      </table>
      <div class="d-flex">
        <div class="mx-auto">
            {{ $orders->links(); }}
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
