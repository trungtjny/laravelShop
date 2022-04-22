
{{-- <div class="container-fluid bg-secondary m-0">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <div class="top-header">
          <p class="m-0 p-2 text-light font-weight-bold">Thế giới đồ chơi trẻ em, đồ chơi an toàn chính hãng cho bé</p>
        </div>
      </div>
      <div class="col-4">
        <div class="top-header">
          <p class="m-0 p-2 text-light font-weight-bold float-end">Hướng dẫn mua hàng</p>
      
        </div>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="container  py-1"  >
  <div class="row  " >
    <div class="col-3">
      <img class="img-fluid"  src="https://sudospaces.com/babycuatoi/2019/10/logo.png" alt="">
    </div>
    <div class="col-3"></div>
    <div class="col-6 align-self-center float-end">
      <form class="d-flex" action="{{route('products')}}" method="GET">
        <input class="form-control me-2 "  type="search" placeholder="Bố mẹ muốn tìm gì cho bé?" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" style="width:20%" type="submit">Tìm kiếm</button>
      </form>
    </div>
   
    <div class="col-3 align-self-center">
     
    </div>
  </div>
</div>
<header class="border ">
    <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-light" >
              <div class="col-8 d-flex  align-items-center ">
                <ul class="nav navbar-nav ">
                    <li class="nav-item">
                      <a class="nav-link"  href="{{route("home")}}"><h6>Trang chủ</h6></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#"><h6>Giới thiệu</h6></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route("products")}}"><h6>Sản phẩm</h6></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><h6>Liên hệ</h6></a>
                    </li>
                  
                  </ul>
            </div>
          <div class="col-4  align-items-center">
            <div class="float-end">
              <ul class="nav nav navbar-nav">

                <a class="nav-link " href="{{route('cart')}}"><h6>Giỏ hàng</h6></a>
                </li>
              @if (Auth::check())
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                    <li><a class="dropdown-item" href="{{route('cart')}}">Giỏ hàng</a></li>
                    <li><a class="dropdown-item" href="{{route('myoders')}}">Đơn hàng</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                  </ul>
                </div>
              </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
              </li>
              @endif
            </ul>
            </div>
          </div>
          </nav>
        </div>
    </div>
</header> --}}
<section class="header pb-5">
  <div class="container ">
      <nav class="navbar navbar-expand-lg  fixed-top p-0 bg-white shadow">
          <div class="container  ">
              <div class="logo ">
                <a class="navbar-brand text-dark" href="#">BabyDream</a>
                <button class="custom-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 p-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-header  text-sp" href="{{route("home")}}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header text-sp" href="{{route("products")}}">Sản phẩm</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link nav-link-header text-sp" href="#">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header text-sp" href="#">Liên hệ</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">

                  
                    @if (Auth::check())
                      <li class="nav-item mx-2 d-none d-lg-block">
                          <a class="btn btn-cart" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i><span class="alert-cart">5</span></a>
                      </li>
                      <div class="dropdown">
                          <button class=" account dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="nav-link-header">Tài khoản</span>
                              </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="nav-link-header " href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i>  Giỏ hàng</a></li>
                              <li><a class="nav-link-header" href="{{route('myoders')}}"><i class="fas fa-shopping-cart"></i>  Đơn mua</a></li>
                              <li><a class="nav-link-header" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>  Đăng xuất </a></li>
                          </ul>
                      </div>
                    @else
                      <li class="nav-item">
                          <a class="nav-link-header " href="{{route('login')}}">Đăng nhập</a>
                      </li>
                      <li class="nav-item">
                          <a class=" nav-link-header" href="#">Đăng ký</a>
                      </li> 
                    @endif

                </ul>
                <!-- <form class="d-flex">
                    <input class="px-2 search" placeholder="Từ khoá tìm kiếm" aria-label="Search">
                    <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
                </form> -->
            </div>
          </div>
      </nav>
  </div>
</section>

<script>
  
function addAtiveClass() {
    let currentnlocation = location.href;
    console.log(currentnlocation);
    let parentItem = document.querySelectorAll(".nav  .nav-link ");

    let parentLength = parentItem.length;
    for (var i = 0; i < parentLength; i++) {
        if (currentnlocation.includes(parentItem[i].href)) {
            console.log(parentItem[i].href);
            parentItem[i].className += " active"
        }
    }
   
}
addAtiveClass();


</script>
