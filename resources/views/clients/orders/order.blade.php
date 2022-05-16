@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-5">
    <div class="card">
      <div class="">
        <div class="row ">
            <div class="col-12">
                <div class="d-flex  align-items-center border-top border-bottom bg-secondary text-white" style="height: 60px">
                    <p class="m-0 ps-2">Trang chủ > </p>
                    <p class="m-0 ps-2">Sản phẩm > </p>
                    <p class="m-0 ps-2"> {{$title}} sản phẩm</p>
                </div>
            </div>
        </div>
    </div>
      <div class="card-body">
        @if (count($orders))
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
                          @case(6)
                              @php $status = 'Đơn huỷ';@endphp
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
        @else 
          <i><h5>Không có đơn đặt hàng</h5></i>    
        @endif
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