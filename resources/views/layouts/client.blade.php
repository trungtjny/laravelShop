<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/assets/clients/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>
<body>
    @include('clients.blocks.header')
    <main>
        <section class="banner mt-1">
            <div class="container">
                <div class="main main-child">
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h1 class="py-3">BabyDream</h1>
                            <h6>Đồ chơi chính hãng, an toàn cho trẻ!</h6>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        <div class="container mb-5">
            <div class="row gx-3">
                <div class="col-3 d-none d-lg-block mt-5">
                    @yield('sidebar')
                </div>
                <div class="content col-lg-9 col-12 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @include('clients.blocks.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
    
    @yield('js')
    <script>
  
    </script>
</body>
</html>