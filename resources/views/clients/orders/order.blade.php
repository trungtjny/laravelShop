@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="cart-header bg-warning py-2">
            <h6 class="m-1 px-2 "><a class="text-dark" href="{{route('home')}}">Trang chủ</a> / <a class="text-dark" href="{{route('myoders')}}">Đơn mua</a></h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $item)
                  <tr>
                      @switch($item->status)
                          @case(1)
                          @php $status = 'Đã xác nhận';@endphp
                            @break
                          @case(2)
                            @php $status = 'Vận chuyển';@endphp
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
                    <td>{{ date('H:i:s d/m/Y',strtotime($item->created_at)) }}</td>
                    <td>{{number_format($item->totalPrice)}} VND</td>
                    <td>{{$status}}</td>
                    <td>
                        <a href={{route('orderdetail', ['id' => $item->id])}} class="btn btn-info">Xem</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

@section('css')
   
@endsection
@section('js')
    <script>
      
    </script>
@endsection