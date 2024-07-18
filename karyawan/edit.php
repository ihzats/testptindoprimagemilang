<?php
include '../koneksi.php';

$id_karyawan = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE IDKaryawan = $id_karyawan");
$karyawan = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $noktp = $_POST['noktp'];
    $telp = $_POST['telp'];
    $kota_tinggal = $_POST['kota_tinggal'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $department = $_POST['department'];
    $kota_penempatan = $_POST['kota_penempatan'];

    $query = "UPDATE karyawan SET 
              Nama='$nama', NoKTP='$noktp', Telp='$telp', Kota_Tinggal='$kota_tinggal', 
              Tanggal_lahir='$tanggal_lahir', Tanggal_Masuk='$tanggal_masuk', 
              Department='$department', Kota_Penempatan='$kota_penempatan' 
              WHERE IDKaryawan=$id_karyawan";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../karyawan.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Get department list for form select
$departments = mysqli_query($koneksi, "SELECT * FROM department");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Karyawan</title>
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

    .form-group input,
    .form-group select {
        width: 75%;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Edit Karyawan</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $karyawan['Nama']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="noktp" class="form-label">No KTP</label>
                <input type="text" class="form-control" id="noktp" name="noktp"
                    value="<?php echo $karyawan['NoKTP']; ?>" required maxlength="16"
                    onkeypress="return /[0-9]/i.test(event.key)">
            </div>
            <div class="form-group">
                <label for="telp" class="form-label">Telp</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $karyawan['Telp']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="kota_tinggal" class="form-label">Kota Tinggal</label>
                <input type="text" class="form-control" id="kota_tinggal" name="kota_tinggal"
                    value="<?php echo $karyawan['Kota_Tinggal']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="<?php echo $karyawan['Tanggal_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                    value="<?php echo $karyawan['Tanggal_Masuk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="department" class="form-label">Departemen</label>
                <select class="form-control" id="department" name="department" required>
                    <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                    <option value="<?php echo $dept['IDDept']; ?>"
                        <?php echo ($dept['IDDept'] == $karyawan['Department']) ? 'selected' : ''; ?>>
                        <?php echo $dept['Nama_Dept']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kota_penempatan" class="form-label">Kota Penempatan</label>
                <select class="form-control" id="kota_penempatan" name="kota_penempatan" required>
                    <option value="Surabaya"
                        <?php echo ($karyawan['Kota_Penempatan'] == 'Surabaya') ? 'selected' : ''; ?>>
                        Surabaya</option>
                    <option value="Nganjuk"
                        <?php echo ($karyawan['Kota_Penempatan'] == 'Nganjuk') ? 'selected' : ''; ?>>Nganjuk</option>
                    <option value="Jakarta"
                        <?php echo ($karyawan['Kota_Penempatan'] == 'Jakarta') ? 'selected' : ''; ?>>Jakarta</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="../karyawan.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>