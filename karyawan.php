<?php include('template/header.php'); ?>
<?php include('template/sidebar.php'); ?>
<?php include('template/topbar.php'); ?>

<!-- Begin Page Content -->
<?php
include 'koneksi.php';

// Cek koneksi ke database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Get employee list
$employees = mysqli_query($koneksi, "SELECT k.*, d.Nama_Dept FROM karyawan k LEFT JOIN department d ON k.Department = d.IDDept");

if (!$employees) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<div class="mx-1">
    <h2 class="mt-3">Manajemen Karyawan</h2>
    <a href="karyawan/add.php" class="btn btn-success mb-3">Tambah Karyawan</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No KTP</th>
                            <th>Telp</th>
                            <th>Kota Tinggal</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Masuk</th>
                            <th>Departemen</th>
                            <th>Kota Penempatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($employees)): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['NoKTP']; ?></td>
                            <td><?php echo $row['Telp']; ?></td>
                            <td><?php echo $row['Kota_Tinggal']; ?></td>
                            <td><?php echo $row['Tanggal_lahir']; ?></td>
                            <td><?php echo $row['Tanggal_Masuk']; ?></td>
                            <td><?php echo $row['Nama_Dept']; ?></td>
                            <td><?php echo $row['Kota_Penempatan']; ?></td>
                            <td class="text-center">
                                <a href="./karyawan/edit.php?id=<?php echo $row['IDKaryawan']; ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="./karyawan/delete.php?id=<?php echo $row['IDKaryawan']; ?>"
                                    class="btn btn-danger btn-sm">Hapus</a>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('template/footer.php'); ?>

<!-- Tambahkan referensi CSS dan JS untuk DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>