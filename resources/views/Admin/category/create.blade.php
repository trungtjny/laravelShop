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
                <form action="{{route('admin.category.store')}}" method="POST">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" class="form-control" name= "name" placeholder="Điền tên danh mục" value="{{old('name')}}">
                        @if ($errors->any('name'))
                                <span class="text-danger ml-2">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Danh mục cha</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="0" selected>Chọn danh mục cha</option>

                                @if (count($categories))
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}"  {{(old('category')==$item->id )?'selected':''}}> {{$item->name}}</option>
                                    @endforeach
                                @endif 
                            </select>
                            @if ($errors->any('category'))
                                <span class="text-danger">{{$errors->first('category')}}</span>
                            @endif
                    </div>
                    
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea rows="5" class="form-control" name="description" value="{{old('description')}}"  placeholder="Enter description"></textarea>
                                @if ($errors->any('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                
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
                   

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card-body -->
            
     

    </section>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'description' );
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

