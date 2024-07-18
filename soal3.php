<?php include('template/header.php'); ?>
<?php include('template/sidebar.php'); ?>
<?php include('template/topbar.php'); ?>
<?php
include 'koneksi.php';

// Mengambil jumlah karyawan
$result_karyawan = mysqli_query($koneksi, "SELECT COUNT(*) AS total_karyawan FROM karyawan");
$row_karyawan = mysqli_fetch_assoc($result_karyawan);
$total_karyawan = $row_karyawan['total_karyawan'];

// Mengambil jumlah department
$result_department = mysqli_query($koneksi, "SELECT COUNT(*) AS total_department FROM department");
$row_department = mysqli_fetch_assoc($result_department);
$total_department = $row_department['total_department'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Jumlah Karyawan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_karyawan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Department Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Department</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_department; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include('template/footer.php'); ?>