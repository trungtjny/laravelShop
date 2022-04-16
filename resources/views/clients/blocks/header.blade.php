    <div class="container">
      <img class="img-fluid" style="width:100%" src="https://sudospaces.com/babycuatoi/2021/11/noel-qua-cho-be.jpg" alt="">
    </div>
<div class="container-fluid bg-secondary m-0">
  
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
 
</div>
<div class="container  py-1"  >
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
<header class="border shadow">
    <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
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
                  <li class="nav-item">
                    <a class="nav-link" href="#"><h6>Hệ thống cửa hàng</h6></a>
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
</header>


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
