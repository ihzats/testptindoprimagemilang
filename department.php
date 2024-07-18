<?php include('template/header.php'); ?>
<?php include('template/sidebar.php'); ?>
<?php include('template/topbar.php'); ?>

<?php
include 'koneksi.php';

// Cek koneksi ke database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Get department list
$departments = mysqli_query($koneksi, "SELECT * FROM department");

if (!$departments) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<div class="container">
    <h2 class="mt-4">Manajemen Departemen</h2>
    <a href="department/add.php" class="btn btn-success mb-3">Tambah Departemen</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Departemen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th class="w-auto">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($departments)): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['Nama_Dept']; ?></td>
                            <td class="text-center">
                                <a href="department/edit.php?id=<?php echo $row['IDDept']; ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="department/delete.php?id=<?php echo $row['IDDept']; ?>"
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