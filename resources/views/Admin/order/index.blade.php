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
            <div>
                <form action="" method="GET" class="d-flex align-items-center">
                    <div class="mx-5" >
                        <label>Tìm kiếm: </label>
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại khách hàng" class="rounded px-3">
                    </div>
                    <div class="">
                        <label for="" class="ms-3">Ngày: </label>
                    <input type="date" name="date_from" id="date_from" class="rounded px-3">
                    <label for=""> Đến: </label>
                    <input type="date" name="date_to" id="date_to" class="rounded px-3">
                    <button type="submit" class="btn btn-success px-3 "> Tìm kiếm</button>
                    </div>
                </form>
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
                <td>{{ $item->totalprice}}</td>
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
                    @case(6)
                        @php $status = 'Đơn bị huỷ';@endphp
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
