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
    <div class="d-flex flex-column" >
        <div class="row">
            <div class="col-6">
                <img src="/uploads/layouts/banner.jpg" alt="" class="img-fluid"> 
            </div>
            <div class="col-6">
                <img src="/uploads/layouts/banner.jpg" alt=""  class="img-fluid"> 
            </div>
        </div>       
        <form action="{{route("admin.design.banner.post")}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" class="mt-3" name="banner">
            <button type="submit">Lưu</button>
        </form>
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
