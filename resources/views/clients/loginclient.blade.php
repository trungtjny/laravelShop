<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{$title}} - Shop-EE | Log in</title>
  <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">   
</head>
<body class="">
    <main class="main" style="">
        <div class="content">
            <div class="container-fluid bg-login " style="min-height: 100vh">
                <div class="row ">
                    <div class="col-10 mx-auto"  >
                        <div class="row " style="height: 100vh">
                            <div class="col-8 my-auto d-md-block d-none">
                                <div class="d-flex align-items-center flex-direction-column">
                                    <div class="  w-100">
                                        <h1 class="text-light" style="font-size: 3rem">BabyStore</h1>
                                        <h2 class="text-light pb-5" style="font-size: 2.5rem">Thế giới đồ chơi an toàn cho trẻ</h2>
                                    </div>
                                    <div>
                                        <img src="/assets/clients/image/bb.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 my-auto">
                                <div style="" class=" px-5 py-5 border bg-light" >
                                    <h1 class="text-center color-df"> Đăng nhập</h1>
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
                                        <div class="mb-3">
                                            <label for="">Email: </label>
                                            <input type="text" class="form-control" name ="username"  value="{{old('username')}}">
                                            @error('username')
                                               <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Password: </label>
                                            <input type="password" class="form-control" name ="password"  value="{{old('password')}}">
                                            @error('password')
                                               <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                
                                        <div class="d-grid gap-2  mb-2 ">
                                            <button type="submit" class=" mt-3 btn bg-df text-bold text-white">Đăng nhập</button>
                                        </div>
                                        @csrf
                                        
                                    </form> 
                                    <div class="mt-3 ">
                                        <a href="{{route('register')}}" class="mt-3 text-dark text-decoration-underline">Đăng ký tài khoản</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </main>
   
</body>
</html>


