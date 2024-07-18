<ul class=" navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Karyawan <sup>2</sup></div>
    </a>
    <li class="nav-item active">
        <a class="nav-link" href="soal3.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="department.php">
            <i class="fas fa-solid fa-building"></i>
            <span>Department</span></a>
    </li>

    <!-- Nav Item - Karyawan -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKaryawan"
            aria-expanded="true" aria-controls="collapseKaryawan">
            <i class="fas fa-solid fa-user"></i>
            <span>Karyawan</span>
        </a>
        <div id="collapseKaryawan" class="collapse" aria-labelledby="headingKaryawan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="karyawan.php">Karyawan</a>
                <a class="collapse-item" href="cekultah.php">Cek Ultah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-solid fa-file-export"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="laporankaryawan.php">Laporan Karyawan</a>
                <a class="collapse-item" href="laporandepartment.php">Laporan Department</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-solid fa-arrow-left"></i>
            <span>Logout</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>