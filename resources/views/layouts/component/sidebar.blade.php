<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #595962;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center" style="border-bottom: 1px solid #334155;">
        <small class="brand-text font-weight-bold text-white" style="letter-spacing: 1px;">APLIKASI ABSENSI SISWA</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-4 pb-3 mb-3 d-flex align-items-center border-bottom" style="border-color: #334155;">
            <div class="image">
                <img src="{{ asset('template/dist/img/images.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 45px; height: 45px;">
            </div>
            <div class="info ml-2">
                <span class="d-block text-white font-weight-bold" style="font-size: 16px;">Admin</span>
                <small class="text-white">Administrator</small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-home text-cyan"></i>
                        <p class="text-white">Dashboard</p>
                    </a>
                </li>

                <!-- Absensi Dropdown -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database text-indigo"></i>
                        <p class="text-white">
                            Absensi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{ url('/siswa') }}" class="nav-link">
                                <i class="far fa-user nav-icon text-blue"></i>
                                <p class="text-white">Absen Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/daftar') }}" class="nav-link">
                                <i class="fas fa-users nav-icon "></i>
                                <p class="text-white">Daftar Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/laporan') }}" class="nav-link">
                                <i class="fas fa-folder nav-icon text-orange"></i>
                                <p class="text-white">Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
