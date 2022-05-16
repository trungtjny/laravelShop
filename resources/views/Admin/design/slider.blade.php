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
            
    
@endsection
@section('css')
    <style>   
    </style>
@endsection
@section('js')
    <script>     
       
    </script>
@endsection
