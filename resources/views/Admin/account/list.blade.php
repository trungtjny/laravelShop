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
            
      <table class="table ">
        <thead>
          <tr>
            <th scope="col" style="width: 50px">STT</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Chức vụ</th>
            <th>Ngày đăng ký</th>
            <th scope="col" style="width: 350px">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @if (count($listUser))
                @foreach ($listUser as $item)
                <tr>
                <td>{{++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email}}</td>
                <td>{{ $item->phone}}</td>
                <td>
                    @if ($item->role ==1)
                        <span class="text-danger">Admin</span>
                    @elseif ($item->role ==2)
                        <span class="text-danger">Nhân viên</span>
                    @elseif ($item->role ==3) 
                        <span class="text-danger">Nhân viên giao hàng</span>
                    @endif
                </td>
                <td>@php
                    $date=date_create($item->created_at);
                    echo date_format($date,"d/m/Y");
                    @endphp
                </td>
                <td>
                    <a href="{{route('admin.editmember', ['id'=> $item->id])}}" class="btn btn-warning btn-sm mx-2">
                    <i class="far fa-edit"> Sửa</i>
                    </a>
                    <a href="{{route('admin.deletemember', ['id'=> $item->id])}}" class="btn btn-danger btn-sm mx-2">
                        <i class="fa fa-trash-o"> Xoá</i>
                        </a>
                </td>
                </tr>
                @endforeach
            @endif
        </tbody>
      </table>
      <div class="d-flex">
        <div class="mx-auto">
            {{ $listUser->links(); }}
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
