<?php
include '../koneksi.php';

$id_karyawan = $_GET['id'];
$query = "DELETE FROM karyawan WHERE IDKaryawan = $id_karyawan";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../karyawan.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>