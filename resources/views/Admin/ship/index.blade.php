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
            
      <div class="card-body m-3">
        <table class="table ">
            <thead>
              <tr>
                <th scope="col" style="width: 50px">STT</th>
                <th scope="col" style="width: 200px">Số điện thoại</th>
                <th scope="col">Nơi nhận</th>
                <th scope="col">Số tiền cần thu</th>
                <th scope="col" style="width: 500px">&nbsp;</th>
                <th scope="col" style="width: 200px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @if (count($orders))
                    @foreach ($orders as $item)
                    <tr>
                    <td>{{++$i }}</td>
                    <td><h5>{{ $item->phone}}</h5></td>
                    <td><h5>{{ $item->address}}</h5></td>
                    <td><h5>{{number_format($item->totalprice)}} VND</h5></td>
                    <td>
                        <button  class="btn btn-warning mx-2 ">
                            <a href="{{route('shipper.show', ['id' => $item->id])}} " class="text-dark">
                                <i class="far fa-edit"> Xem chi tiết </i>
                                </a>
                        </button>
                        
                        <button class="btn btn-danger text-light acceptOrder" >
                            Nhận đơn
                            <input type="hidden" name="order_id" class="order_id" value="{{$item->id}}">
                        </button>
                    </td>
                    <td>
                    </td>
                    </tr>
                    @endforeach
                @else
                    <td colspan="6"><h3>Không có đơn hàng nào</h3></td>   
                @endif
            </tbody>
          </table>
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
