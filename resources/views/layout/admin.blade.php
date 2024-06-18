<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UMAH PROPERTI PERSADA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">OMAH PROPERTI</span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->nama }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/daftarpelanggan" class="nav-link">
              <i class="nav-icon fas fas fa-users"></i>
              <p>
                Daftar Pelanggan

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Kantor
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/kas" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kas Kantor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kantorkeluar" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Uang Kantor Keluar</p>
                    </a>
                </li>

            </ul>
        </li>

          <li class="nav-item">
              <a href="/hutang" class="nav-link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                    Hutang Piutang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/keuangan" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    Laporan
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('laporanpelanggan') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporankantor" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Kantor</p>
                    </a>
                </li>

            </ul>
        </li>
            <li class="nav-item">
              <a href="/backup" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Back up Data
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/riwayat" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Riwayat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<script src="{{ asset ('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset ('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset ('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset ('lte/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset ('lte/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset ('lte/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset ('lte/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset ('lte/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset ('lte/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('lte/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('lte/dist/js/pages/dashboard2.js')}}"></script>

@if ($message = Session::get('success'))
<script>
    Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ Session::get('success') }}'
        });
</script>
@endif
@if ($message = Session::get('failed'))
<script>
   Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ Session::get('failed') }}'
        });
</script>
@endif

@yield('scripts')
</body>
</html>
