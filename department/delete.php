<?php
include '../koneksi.php';

$id_dept = $_GET['id'];
$query = "DELETE FROM department WHERE IDDept = $id_dept";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../department.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>