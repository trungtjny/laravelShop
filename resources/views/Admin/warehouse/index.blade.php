@extends('layouts/admin')
@section('title')
    {{ $title }}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger  ">{{ Session::get('error') }}</div>
    @endif
    <div class="row px-5">
        <div class="col-11">
            @if (count($data))
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng nhập</th>
                            <th scope="col">Đơn giá/sản phẩm</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">---</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ number_format($item->amount * $item->price) . ' ' }} VND</td>
                                <td>@php
                                    $date = date_create($item->created_at);
                                    echo date_format($date, 'd/m/Y -- H:i:s');
                                @endphp</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                          ---
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                          <li><a class="dropdown-item" href="{{route('admin.warehouse.edit', ['id' => $item->id])}}">Sửa</a></li>
                                        </ul>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1><i>Chưa có đơn nhập hàng nào.</i></h1>
            @endif

        </div>
        <div class="col-4"></div>
    </div>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

@endsection
