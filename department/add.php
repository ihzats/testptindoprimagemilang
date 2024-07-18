<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_dept = $_POST['nama_dept'];

    $query = "INSERT INTO department (Nama_Dept) VALUES ('$nama_dept')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../department.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Departemen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .form-group {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .form-group label {
        width: 20%;
        min-width: 150px;
        margin-right: 10px;
    }

    .form-group input {
        width: 75%;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-4 ">Tambah Departemen</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_dept" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="nama_dept" name="nama_dept" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="../department.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>