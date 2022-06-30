@extends('layouts/admin')
@section('title')
    {{ $title }}
@endsection
@section('head')
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger text-center ">{{ Session::get('error') }}</div>
    @endif
    <form action="{{ route('admin.warehouse.update',['id' => $data->id]) }}" method="POST" class="w-50">
        @csrf
        <div class="form-group">
            <label>Chọn sản phẩm:</label>
            <br>
            <select name="product_id" id="product_id" class="text-center" style="padding-bottom: 20px !important">
                <option value="0" class="py-5">Chọn sản phẩm</option>
                @foreach ($products as $key => $item)
                    <option value="{{ $key }}" {{($data->product_id == $key) ? 'selected' : ""}}>{{ $item }}</option>
                @endforeach
            </select>
            @if ($errors->any('product_id'))
                <span class="text-danger ml-2">{{ $errors->first('product_id') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Giá nhập</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Giá 1sp/VND"
                value="{{ $data->price }}" min="0">
            @if ($errors->any('price'))
                <span class="text-danger ml-2">{{ $errors->first('price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="amount">Số lượng nhập:</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="Điền tên danh mục"
                value="{{ $data->amount }}" min="0">
            @if ($errors->any('amount'))
                <span class="text-danger ml-2">{{ $errors->first('amount') }}</span>
            @endif
        </div>
        <div>
            <h4>Tổng cộng: <span id="total">{{number_format($data->price*$data->amount)}}</span> VND</h4>
        </div>
        <button class="btn btn-primary ">Cập nhật</button>
    </form>
    </div>
    </section>
@endsection
@section('footer')
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product_id').select2();
        });
        $('#amount').keyup(function(e) {
            let a = $('#amount').val();
            let b = $('#price').val();
            console.log(a * b);
            let c = a * b;
            $('#total').text(
                c
            );
        });
        $('#price').keyup(function(e) {
            let a = $('#amount').val();
            let b = $(this).val();
            console.log(a * b);
            let c = a * b;
            $('#total').text(
                c
            );
        });
    </script>
@endsection
