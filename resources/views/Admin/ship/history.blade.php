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
                <th scope="col">Thời gian hoàn thành</th>
              </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @if (count($data))
                    @foreach ($data as $item)
                        @if ($item['order'])
                            <tr>
                            <td>{{++$i }}</td>
                            <td><h5>{{ $item['order']->phone}}</h5></td>
                            <td><h5>{{ $item['order']->address}}</h5></td>
                            <td><h5>{{number_format($item['order']->totalprice)}} VND</h5></td>
                            <td>{{ $item['order']->updated_at}}</td>
                            </tr>
                        @endif
                    @endforeach
                  
                @endif
                @if ($i==0)
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
