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
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <table class="table ">
        <thead>
          <tr>
            <th scope="col" style="width: 50px">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Hiển thị</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" style="width: 150px">&nbsp;</th>
    
          </tr>
        </thead>
        <tbody>
          @php
              
    $html ='';
    $sub ='|---';
    foreach($categories as $key => $item){
        if($item->parent_id == 0){
            $html .= '
            <tr>
                <td>'. $item->id.'</td>
                <td>'.$item->name.'</td>
                <td>'. $item->active.'</td>
                <td>'. $item->created_at.'</td>
                <td>
                    <a href="'.route('admin.category.edit', ['id' => $item->id]).'"  class="btn btn-warning btn-sm mx-2">
                    <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm mx-2" onclick="removeRow('.$item->id.',\''.route('admin.category.destroy').'\')">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            ';
            $id = $item->id;
            foreach($categories as $key => $item){
              if($item->parent_id == $id){
                  $html .= '
                  <tr>
                    <td>'. $item->id.'</td>
                    <td>'.$sub.$item->name.'</td>
                    <td>'. $item->active.'</td>
                    <td>'. $item->updated_at.'</td>
                    <td>
                        <a href="'.route('admin.category.edit', ['id' => $item->id]).'"  class="btn btn-warning btn-sm mx-2">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm mx-2" onclick="removeRow('.$item->id.',\''.route('admin.category.destroy').'\')">
                        <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                  </tr>
                  ';
                }
           }
          }
    }
    echo $html; 
  @endphp
          
          
           
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
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
