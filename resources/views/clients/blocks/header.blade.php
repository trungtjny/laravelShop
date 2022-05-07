<section class="header pb-5">
  <div class="container ">
      <nav class="navbar navbar-expand-lg  fixed-top p-0 bg-white shadow">
          <div class="container ">
              <div class="logo ">
                <a class="navbar-brand text-dark" href="#">BabyStore</a>
                <button class="custom-toggler navbar-toggler my-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link nav-link-header text-sp" href="#">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header text-sp" href="#">Liên hệ</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">

                  
                    @if (Auth::check())
                      <li class="nav-item mx-2 d-none d-lg-block">
                          <a class="btn btn-cart" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i><span class="alert-cart">{{$cartQuantity}}</span></a>
                      </li>
                      <div class="dropdown">
                          <button class=" account dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="nav-link-header">Tài khoản</span>
                              </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="nav-link-header " href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i>  Giỏ hàng</a></li>
                              <li><a class="nav-link-header" href="{{route('myoders')}}"><i class="fas fa-shopping-cart"></i>  Đơn mua</a></li>
                              <li><a class="nav-link-header" href="{{route('account')}}"><i class="fas fa-sign-out-alt"></i>Tài khoản </a></li>
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
