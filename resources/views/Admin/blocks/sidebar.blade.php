        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
           
            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQGiX6zu6YcaFfNLvfBXVcBPuVvv97cHvk0lKm0PUQLqNbiwl4ZGulFvY30qHBITYtvlg&usqp=CAU" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name }}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- menu nhân viên --}}
                <li class="nav-item  active">
                    <a href="{{route('admin.index')}}" class="nav-link  ">
                    <i class="fa fa-home p-2"></i>
                    <p> HOME</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="" class="nav-link ">
                    <i class="nav-icon fa fa-folder "></i>
                    <p>
                        Giao diện
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('admin.design.banner')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.design.slider')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                        </a>
                    </li>
                    </ul>
                </li>
                @if (Auth::user()->role <=2 )
                <li class="nav-header mt-3"><h5 class="text-warning">Nhân viên</h5></li>
                <li class="nav-item ">
                    <a href="{{route('admin.category')}}" class="nav-link ">
                    <i class="nav-icon fa fa-folder "></i>
                    <p>
                        Danh mục
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('admin.category')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.category.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm danh mục</p>
                        </a>
                    </li>
                    </ul>
                </li>
               
                <li class="nav-item   ">
                    <a href="{{route('admin.products')}}" class="nav-link ">
                    <i class="nav-icon fa fa-btc "></i>
                    <p>
                        Sản phẩm
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.products')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.products.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm sản phẩm</p>
                        </a>
                    </li>
                    
                    </ul>
                </li>
                {{-- Đơn hàng --}}
                <li class="nav-item ">
                    <a href="{{route('admin.order.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Đơn hàng
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.order.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách đơn hàng</p>
                        </a>
                    </li>
                    </ul>
                </li>
                @endif

                
                @if (Auth::user()->role ==3 || Auth::user()->role ==1)
                    
                <li class="nav-header"><h5 class="text-warning">Shipper</h5></li>
                <li class="nav-item    ">
                    <a href="{{route('shipper')}}" class="nav-link ">
                    <i class="nav-icon fa fa-truck"></i>
                    <p>
                        Menu shipper
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('shipper')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng
                                <span class="right badge badge-danger">
                                    {{-- @php
                                        if(empty($orders)) echo count($orders);
                                    @endphp --}}
                                </span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('shipper.x')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng đã nhận</p>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="{{route('shipper.y')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng hoàn thành</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->role ==1)
                <li class="nav-header"><h5 class="text-warning">Quản lý nhân sự</h5></li>
                <li class="nav-item">
                    <a href="{{route('admin.listmember')}}" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Nhân viên
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.listmember')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách nhân viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.addmember')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm nhân viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../mailbox/read-mail.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Read</p>
                        </a>
                    </li>
                    </ul>
                </li>
                @endif
                <li class="nav-header"><h5 class="text-warning">Tài khoản</h5></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Quản lý tài khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Logout</p>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
