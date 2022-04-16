@extends('layouts/admin')
@section('title')
    {{$title}}
@endsection
@section('head')
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    
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
                <form action="{{route('admin.products.store')}}" method="POST"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name= "name" placeholder="Điền tên sản phẩm" value="{{old('name')}}">
                                    @if ($errors->any('name'))
                                            <span class="text-danger ml-2">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_id">Danh mục sản phẩm</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="0" selected>Chọn danh mục</option>
                                            @php
                                                    $html ='';
                                                    $sub ='|---';
                                                    foreach($categories as $key => $item){
                                                        if($item->parent_id == 0){
                                                            if(old('category_id') && old('category_id') == $item->id )  $selected = "selected"; 
                                                            else $selected = '';
                                                            $html .= '<option value="'.$item->id.'"'.$selected.'> '.$item->name.'</option>';
                                                            $id = $item->id;
                                                            foreach($categories as $key => $item){
                                                                if($item->parent_id == $id){
                                                                    if(old('category_id') && old('category_id') == $item->id )  $selected = "selected"; 
                                                                    else $selected = '';
                                                                    $html .= '<option value="'.$item->id.'"'.$selected.'> '.$sub.$item->name.'</option>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                echo $html; 
                                            @endphp
                                        </select>
                                        @if ($errors->any('category'))
                                            <span class="text-danger">{{$errors->first('category')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Giá bán</label>
                                    <input type="number" class="form-control" name= "price" placeholder="Giá sản phẩm" value="{{old('price')}}">
                                </div>
                                @if ($errors->any('price'))
                                <span class="text-danger ml-2">{{$errors->first('price')}}</span>
                        @endif
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sale">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" name= "price_sale" placeholder="Giá khuyến mãi" value="{{old('price_sale')}}">
                                </div>
                                @if ($errors->any('sale'))
                                    <span class="text-danger ml-2">{{$errors->first('price_sale')}}</span>
                                @endif
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="amount">Số lượng sản phẩm</label>
                                    <input type="number" class="form-control" name= "amount" placeholder="0-999999" value="{{old('amount')}}">
                                </div>
                                @if ($errors->any('amount'))
                                    <span class="text-danger ml-2">{{$errors->first('amount')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" value="{{old('file')}}" placeholder="Chosse upload" id="file" name="file"> 
                            @if ($errors->any('upload'))
                                <span class="text-danger">{{$errors->first('file')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Giới thiệu chung</label>
                            <textarea rows="3" class="form-control" name="description"  id="description"  placeholder="Nhập thông tin giới thiệu">{{old('description')}}</textarea>
                            @if ($errors->any('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="product_content">Thông tin sản phẩm</label>
                            <textarea rows="5" class="form-control" name="product_content" id="product_content" placeholder="Chi tiết sản phẩm">{{old('product_content')}}</textarea>
                            @if ($errors->any('product_content'))
                                <span class="text-danger">{{$errors->first('product_content')}}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Kích hoạt</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="active" value="1" name="active" checked="">
                                        <label for="active" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" >
                                        <label for="no_active" class="custom-control-label">Không</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Bán với giá khuyến mãi</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="active_sale" value="1" name="active_sale" checked="">
                                        <label for="active_sale" class="custom-control-label">Có</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" value="0" id="no_active_sale" name="active_sale" >
                                        <label for="no_active_sale" class="custom-control-label">Không</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    @csrf
                </form>
            </div>
    </section>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'product_content' );
    </script>
@endsection
@section('css')
    <style>   
    </style>
@endsection
@section('js')
    <script> 
      
    </script>
@endsection

