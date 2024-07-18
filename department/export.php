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
header("Pragma: no-cache");
header("Expires: 0");

echo "Department\tSURABAYA\tNGANJUK\tJAKARTA\n";

while ($row = mysqli_fetch_assoc($result)) {
    echo "{$row['Nama_Dept']}\t{$row['Surabaya']}\t{$row['Nganjuk']}\t{$row['Jakarta']}\n";
}
?>