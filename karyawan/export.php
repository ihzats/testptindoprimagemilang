<?php
include '../koneksi.php';

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

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_karyawan_department_penempatan.xls");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rekap Laporan Jumlah Karyawan per Department vs Penempatan</title>
</head>

<body>
    <h2>Rekap Laporan Jumlah Karyawan per Department vs Penempatan</h2>
    <table border="1">
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
</body>

</html>