<?php include('template/header.php'); ?>
<?php include('template/sidebar.php'); ?>
<?php include('template/topbar.php'); ?>
<?php
include 'koneksi.php';

// Mengambil data jumlah karyawan per department vs penempatan
$query = "
    SELECT 
        d.Nama_Dept,
        SUM(CASE WHEN k.Kota_Penempatan = 'SURABAYA' THEN 1 ELSE 0 END) AS Surabaya,
        SUM(CASE WHEN k.Kota_Penempatan = 'NGANJUK' THEN 1 ELSE 0 END) AS Nganjuk,
        SUM(CASE WHEN k.Kota_Penempatan = 'JAKARTA' THEN 1 ELSE 0 END) AS Jakarta
    FROM 
        karyawan k
    LEFT JOIN 
        department d ON k.Department = d.IDDept
    GROUP BY 
        d.Nama_Dept
    ORDER BY 
        d.Nama_Dept;
";

$result = mysqli_query($koneksi, $query);
?>

<!-- Begin Page Content -->
<div class="container container-fluid">
    <!-- Page Heading -->
    <div class="align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Laporan Jumlah Karyawan per Department vs Penempatan</h1>
    </div>

    <!-- Tombol Ekspor -->
    <div class="mb-4">
        <a href="department/export.php" class="btn btn-warning">Export to Excel</a>
    </div>

    <!-- Tabel Laporan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>SURABAYA</th>
                            <th>NGANJUK</th>
                            <th>JAKARTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['Nama_Dept']; ?></td>
                            <td><?php echo $row['Surabaya']; ?></td>
                            <td><?php echo $row['Nganjuk']; ?></td>
                            <td><?php echo $row['Jakarta']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('template/footer.php'); ?>