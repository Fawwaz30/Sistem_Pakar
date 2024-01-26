<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar Diagnosa Gejala Kecanduan Game Online</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/bootstrap-4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/6b9w7i61n7pdiffyre287yfizb13vrzbky43ntx93bn1wzqq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-awal.png') }}" type="image/x-icon">

    @yield('css')
</head>
<style>
       @font-face /*perintah untuk memanggil font eksternal*/
  {
    font-family: 'Gameplay'; /*memberikan nama bebas untuk font*/
    src: url('assets/gameplay/Gameplay.ttf');/*memanggil file font eksternalnya di folder nexa*/
  }
  .main-sidebar .brand-text b {
 
  font-weight: normal;
  font-family: "Gameplay";
  text-transform: uppercase;
  margin-bottom: 15px;
  color: #ffffff;
}
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary bg-#0383ef elevation-1" style = "background:#0383ef;">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('assets/images/logo-awal.png') }}" alt="Logo" class="brand-image">
                <span class="brand-text font-Gameplay"><b>SISPAKGO</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar"  style = "background:#fffff;">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="info d-flex flex-column">
                        <a href="#" class="d-block text-white"><b>{{ auth()->user()->name }}</b></a>
                        <small class="d-block text-white">{{ auth()->user()->role->name }}</small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item text-white">
                            <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->segment(1) == 'dashboard' || request()->segment(1) == '' || request()->segment(1) == 'home' ? 'active' : '' }}"><i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>


                        @if (auth()->user()->role_id == 1)
                            <li class="nav-item">
                                <a href="{{ route('gejala.index') }}" class="nav-link text-white {{ request()->segment(1) == 'gejala' ? 'active' : '' }}"><i class="nav-icon fas fa-list"></i>
                                    <p>Data Gejala</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('penyakit.index') }}" class="nav-link text-white {{ request()->segment(1) == 'penyakit' ? 'active' : '' }}"><i class="nav-icon fas fa-book-medical"></i>
                                    <p>Data Jenis Kecanduan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aturan.index') }}" class="nav-link text-white {{ request()->segment(1) == 'aturan' ? 'active' : '' }}"><i class="nav-icon fas fa-check"></i>
                                    <p>Data Aturan (Rule)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profil.index') }}" class="nav-link text-white {{ request()->segment(1) == 'profil' ? 'active' : '' }}"><i class="nav-icon fas fa-info-circle"></i>
                                    <p>Data Tentang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('artikel.index') }}" class="nav-link text-white {{ request()->segment(1) == 'artikel' ? 'active' : '' }}"><i class="nav-icon fas fa-newspaper"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link text-white {{ request()->segment(1) == 'hasil' ? 'active' : '' }}"><i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Diagnosa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengguna.index') }}" class="nav-link text-white {{ request()->segment(1) == 'pengguna' ? 'active' : '' }}"><i class="nav-icon fas fa-users"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                        @elseif (auth()->user()->role_id == 2)
                            <!-- <li class="nav-item">
                                <a href="{{ route('artikel.index') }}" class="nav-link text-white {{ request()->segment(1) == 'artikel' ? 'active' : '' }}"><i class="nav-icon fas fa-newspaper"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('diagnosis') }}" class="nav-link text-white {{ request()->segment(1) == 'diagnosis' ? 'active' : '' }}"><i class="nav-icon fas fa-list"></i>
                                    <p>Diagnosa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link text-white {{ request()->segment(1) == 'hasil' ? 'active' : '' }}"><i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Diagnosa</p>
                                </a>
                            </li>
                        @elseif (auth()->user()->role_id == 3)
                            <li class="nav-item">
                                <a href="{{ route('diagnosis') }}" class="nav-link text-white {{ request()->segment(1) == 'diagnosis' ? 'active' : '' }}"><i class="nav-icon fas fa-list-alt"></i>
                                    <p>Diagnosa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hasil.index') }}" class="nav-link text-white {{ request()->segment(1) == 'hasil' ? 'active' : '' }}"><i class="nav-icon fas fa-list-alt"></i>
                                    <p>Data Hasil Diagnosa</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('password') }}" class="nav-link text-white {{ request()->segment(1) == 'password' ? 'active' : '' }}"><i class="nav-icon fas fa-unlock"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link text-white"><i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; @php echo date('Y') @endphp - <a href="#" class="text-primary">SISPAKGO</a>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('js')
</body>

</html>
