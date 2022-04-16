<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                         <div class="alert alert-danger text-center ">{{Session::get('error')}}</div>
                    @endif
                    <form action="{{route('postRegister')}}" method="POST">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg">Your Name</label>
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"  name="name" value="{{old('name')}}"/>
                        
                        @if ($errors->any('name'))
                                <span class="text-danger ml-2">{{$errors->first('name')}}</span>
                        @endif
                      </div>
      
                      <div class="form-outline mb-4">
                          <label class="form-label" for="form3Example3cg">Your Email</label>
                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email"   value="{{old('email')}}"/>
                        @if ($errors->any('email'))
                            <span class="text-danger ml-2">{{$errors->first('email')}}</span>
                        @endif
                      </div>
      
                      <div class="form-outline mb-4">
                          <label class="form-label" for="form3Example4cg">Password</label>
                          <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"  value="{{old('password')}}" />
                        @if ($errors->any('password'))
                            <span class="text-danger ml-2">{{$errors->first('password')}}</span>
                        @endif
                      </div>
      
                      <div class="form-outline mb-4">
                          <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password_confirmation"  value="{{old('password_confirmation')}}"/>
                        @if ($errors->any('password_confirmation'))
                            <span class="text-danger ml-2">{{$errors->first('password_confirmation')}}</span>
                        @endif
                      </div>
      
                     
      
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block btn-lg  text-light" style="font-weight: bold">Đăng ký tài khoản</button>
                      </div>
                      <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a></p>
                      @csrf
                    </form>
      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>