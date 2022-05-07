@extends('layouts/clientFull')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container mt-5  ">
    <div class="bg-light">
       
    <div class="mb-3">
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex  align-items-center border-top border-bottom bg-secondary text-white" style="height: 60px">
                    <p class="m-0 ps-2">Trang chủ > </p>
                    <p class="m-0 ps-2"> {{$title}} </p>
                </div>
            </div>
        </div>
        <div class="row gy-5">
             <div class="col-10 mx-auto">
               @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                    </div>
               @endif
               @if (Session::has('error'))
                    <div class="alert alert-danger text-center ">{{Session::get('error')}}</div>
               @endif
               <form action="{{route('update-profile')}}" method="POST">
                    @csrf
                    <div class="row">
                         <div class="col-3 d-flex align-items-center">
                              Tên
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>{{$account->fname." ".$account->lname}}</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-name">Chỉnh sửa</p>
                         </div>
                         <div class="col-12 d-flex justify-content-end">
                                  <div  id="edit-name">
                                   <span>Họ đệm: </span>
                                   <input type="text" name="fname" class="me-5 ps-2 rounded-pill border border-info" value="{{$account->fname}}">
                                   @if ($errors->any('fname'))
                                        <span class="text-danger ml-2">{{$errors->first('fname')}}</span>
                                   @endif
                                   <span>Tên: </span>
                                   <input type="text" name="lname"  class="me-5 ps-2 rounded-pill border border-info" value="{{$account->lname}}">
                                   @if ($errors->any('lname'))
                                        <span class="text-danger ml-2">{{$errors->first('lname')}}</span>
                                   @endif
                                   <button type="submit" class="btn btn-info text-dark">Lưu thay đổi</button>
                                  </div>
                         </div>
                         <div class="col-3 d-flex align-items-center">
                              Email
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>{{$account->email}}</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-email">Chỉnh sửa</p>
                         </div>
                         <div class="col-12 d-flex justify-content-end">
                              <div  id="edit-email">
                                   <span>Email đăng nhập: </span>
                                   <input type="text" name="email" class="me-5 ps-2 rounded-pill border border-info" value="{{$account->email}}">
                                   @if ($errors->any('email'))
                                        <span class="text-danger ml-2">{{$errors->first('email')}}</span>
                                   @endif
                                   <button type="submit" class="btn account-btn bg-info p-1 ">Lưu thay đổi</button>
                              </div>
                         </div>
                         <div class="col-3 d-flex align-items-center">
                              Số điện thoại
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>{{$account->phone}}</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-phone">Chỉnh sửa</p>
                         </div>
                         <div  class="col-12 d-flex justify-content-end">
                              <div id="edit-phone">
                                   <span>Số điện thoại: </span>
                                   <input type="text" name="phone" class="me-5 ps-2 rounded-pill border border-info" value="{{$account->phone}}">
                                   @if ($errors->any('phone'))
                                        <span class="text-danger ml-2">{{$errors->first('phone')}}</span>
                                   @endif
                                   <button type="submit" class="btn account-btn bg-info p-1 ">Lưu thay đổi</button>
                              </div>     
                         </div>
                         <div class="col-3 d-flex align-items-center">
                              Thành phố
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>{{$account->city}}</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-city">Chỉnh sửa</p>
                         </div>
                         <div  class="col-12 d-flex justify-content-end">
                              <div  id="edit-city">
                                   <span>Nơi sống: </span>
                                   <input type="text" name="city" class="me-5 ps-2 rounded-pill border border-info" value="{{$account->city}}">
                                   @if ($errors->any('city'))
                                        <span class="text-danger ml-2">{{$errors->first('city')}}</span>
                                   @endif
                                   <button type="submit" class="btn account-btn bg-info p-1 ">Lưu thay đổi</button>
                              </div>     
                         </div>
                         <div class="col-3 d-flex align-items-center">
                              Địa chỉ
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>{{$account->address}}</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-address">Chỉnh sửa</p>
                         </div>
                         <div  class="col-12 d-flex justify-content-end">
                              <div  id="edit-address">
                                   <span>Địa chỉ </span>
                                   <input type="text" name="address" class="me-5 ps-2 rounded-pill border border-info" value="{{$account->address}}">
                                   @if ($errors->any('address'))
                                        <span class="text-danger ml-2">{{$errors->first('address')}}</span>
                                   @endif
                                   <button type="submit" class="btn account-btn bg-info p-1 ">Lưu thay đổi</button>
                              </div>     
                         </div>
                         <div class="col-3 d-flex align-items-center">
                              Mật khẩu
                         </div>
                         <div class="col-9 d-flex justify-content-between">
                              <p>**********</p>
                              <p class="btn account-btn edit-btn" id="btn-edit-password">Chỉnh sửa</p>
                         </div>
                         <div  class="col-12 d-flex justify-content-end">
                              <div  id="edit-password">
                                   <span>Mật khẩu cũ: </span>
                                   <input type="text" name="password" class="ps-2 rounded-pill border border-info" >
                                   @if ($errors->any('password'))
                                        <span class="text-danger ml-2">{{$errors->first('password')}}</span>
                                   @endif
                                   <span class="ms-3">Mật khẩu mới:</span>
                                   <input type="text" name="new-password" class=" ps-2 rounded-pill border border-info" >
                                   @if ($errors->any('new-password'))
                                        <span class="text-danger ml-2">{{$errors->first('new-password')}}</span>
                                   @endif
                                   <button type="submit" class="btn account-btn bg-info p-1 ms-3 ">Lưu thay đổi</button>
                              </div>     
                         </div>
                    </div> 
               </form>
             </div>
        </div>
    </div> 
    
    </div>
</div>
@endsection
@section('sidebar')
@endsection
@section('css')
@endsection
@section('js')
    <script>
          $(document).ready(function () {
               let showname=false;
               let showemail=false;
               let showephone=false;
               let showecity=false;
               let showaddress=false;
               let showpassword=false;
               $("#edit-name").hide();
               $("#edit-email").hide();
               $("#edit-phone").hide();
               $("#edit-city").hide();
               $("#edit-address").hide();
               $("#edit-password").hide();
               $("#btn-edit-name").click(function (e) { 
                    e.preventDefault(); 
                    showname = !showname;
                    if(showname) $("#edit-name").show();
                    else $("#edit-name").hide();
               });
               $("#btn-edit-email").click(function (e) { 
                    e.preventDefault(); 
                    showemail = !showemail;
                    if(showemail) $("#edit-email").show();
                    else $("#edit-email").hide();
               });
               $("#btn-edit-phone").click(function (e) { 
                    e.preventDefault(); 
                    showephone = !showephone;
                    if(showephone) $("#edit-phone").show();
                    else $("#edit-phone").hide();
               });
               $("#btn-edit-city").click(function (e) { 
                    e.preventDefault(); 
                    showecity = !showecity;
                    if(showecity) $("#edit-city").show();
                    else $("#edit-city").hide();
               });
               $("#btn-edit-address").click(function (e) { 
                    e.preventDefault(); 
                    showaddress = !showaddress;
                    if(showaddress) $("#edit-address").show();
                    else $("#edit-address").hide();
               });
               $("#btn-edit-password").click(function (e) { 
                    e.preventDefault(); 
                    showpassword = !showpassword;
                    if(showpassword) $("#edit-password").show();
                    else $("#edit-password").hide();
               });
          });
        
    </script>
@endsection