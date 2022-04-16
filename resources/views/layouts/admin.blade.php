<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') - trungptit AdminLTE 3 | Log in</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">


  
  <link rel="stylesheet" href="/template/admin/css/custom.css">
  {{-- end css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" integrity="sha512-p++g4gkFY8DBqLItjIfuKJPFvTPqcg2FzOns2BNaltwoCOrXMqRIOqgWqWEvuqsj/3aVdgoEo2Y7X6SomTfUPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('head')
</head>
<body class="hold-transition  sidebar-mini">
    {{-- navbar --}}
    @include('Admin.blocks.nav')
    {{-- sidebar --}}
    @include('Admin.blocks.sidebar')
    {{-- content --}}
    <div class="main">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Trang quản trị</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <div class="card">
          <div class="card-header  bg-info">
              <h3 class="card-title">{{$title}}</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                  </button>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-body ">
             <!-- Main content -->
            @yield('content')
        
              <!-- /.content -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              Footer
          </div>
          <!-- /.card-footer-->
      </div>
      </div>
    </div>   
  <!-- /.content-wrapper -->
    {{-- footer --}}
    @include('Admin.blocks.footer')

  {{--   <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/template/admin/dist/js/demo.js"></script>
     --}}
     
      <!-- jQuery -->
  <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
  <script src="/template/admin/plugins/chart.js/Chart.min.js"></script>

  <!-- Bootstrap -->
  <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="/template/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="/template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/template/admin/dist/js/adminlte.min.js"></script>
  <!-- Filterizr-->
  <script src="/template/admin/plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/template/admin/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/template/admin/js/main.js"></script>
    
  <script src="/template/admin/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/template/admin/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/template/admin/dist/js/pages/dashboard3.js"></script>
    @yield('footer')
    @yield('js')
</body>
</html>
