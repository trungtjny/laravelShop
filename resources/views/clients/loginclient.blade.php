<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{$title}} - Shop-EE | Log in</title>
  <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">   
</head>
<body class="bg-secondary">
    
    <main class="" style="">
        <div class="content">
            <div class="container ">
                
                <div style="margin: 20vh auto; width:50vh" class=" px-5 py-5 border border-info bg-light" >
                    <h1 class="text-center"> Đăng nhập</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                           <h6> {{'Vui lòng kiểm tra lại dữ liệu'}}</h6>
                        </div>
                    @endif
                    
                   @if (Session::has('error'))
                        <div class="alert alert-danger text-center">{{Session::get('error')}}</div>
                   @endif
                    <br>
                    <form action="{{route('postLogin')}}" method="POST">
                        <div class="mb-2">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name ="username"  value="{{old('username')}}">
                            @error('username')
                               <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name ="password"  value="{{old('password')}}">
                            @error('password')
                               <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-5 mb-2">
                            <button type="submit" class=" mt-3 btn btn-info">Login</button>
                        </div>
                        @csrf
                        
                    </form> 
                    <div class="mt-3-d-flex">
                        <a href="{{route('register')}}" class="mt-3">Đăng ký tài khoản</a>
                    </div>
                </div>
                
            </div>   
        </div>
    </main>
   
</body>
</html>


