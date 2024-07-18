<?php include('template/header.php'); ?>
<?php include('template/sidebar.php'); ?>
<?php include('template/topbar.php'); ?>

<?php
include 'koneksi.php';

$query = "SELECT Nama, DATE_FORMAT(Tanggal_lahir, '%m-%d') AS Tanggal_lahir, Department, Telp FROM karyawan";
$result = mysqli_query($koneksi, $query);
$karyawan = [];
while ($row = mysqli_fetch_assoc($result)) {
    $karyawan[] = $row;
}

$selected_month = isset($_POST['bulan']) ? $_POST['bulan'] : date('m');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kalender Ulang Tahun Karyawan</h1>
    </div>

    <!-- Form Pilih Bulan -->
    <form method="post" class="mb-4">
        <div class="form-group">
            <label for="bulan">Pilih Bulan:</label>
            <select name="bulan" id="bulan" class="form-control" onchange="this.form.submit()">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $month = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $selected = ($month == $selected_month) ? 'selected' : '';
                    echo "<option value=\"$month\" $selected>" . date('F', mktime(0, 0, 0, $i, 10)) . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div id="calendar">
                <?php
                // Membuat array nama bulan
                $month_name = date('F', mktime(0, 0, 0, $selected_month, 10));
                echo '<h3>' . $month_name . '</h3>';
                echo '<table class="table table-bordered">';
                echo '<thead><tr>';
                for ($i = 1; $i <= 7; $i++) {
                    echo '<th>' . $i . '</th>';
                }
                echo '</tr></thead>';
                echo '<tbody><tr>';

                for ($i = 1; $i <= 31; $i++) {
                    $date = $selected_month . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                    $isBirthday = false;
                    $employeeName = '';

                    foreach ($karyawan as $k) {
                        if ($k['Tanggal_lahir'] == $date) {
                            $isBirthday = true;
                            $employeeName = $k['Nama'];
                            break;
                        }
                    }

                    if ($isBirthday) {
                        echo '<td class="bg-success text-white" onclick="showDetails(\'' . $employeeName . '\')">' . $i . '<br>' . $employeeName . '</td>';
                    } else {
                        echo '<td>' . $i . '</td>';
                    }

                    if ($i % 7 == 0) {
                        echo '</tr><tr>';
                    }
                }

                echo '</tr></tbody>';
                echo '</table>';
                ?>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Detail Karyawan</h5>
            <p id="employee-details"></p>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
function showDetails(name) {
    <?php
    $query_departments = "SELECT k.Nama, d.Nama_Dept, k.Telp 
                          FROM karyawan k 
                          LEFT JOIN department d ON k.Department = d.IDDept";
    $result_departments = mysqli_query($koneksi, $query_departments);
    $employeeDetails = [];
    while ($row = mysqli_fetch_assoc($result_departments)) {
        $employeeDetails[$row['Nama']] = [
            'Department' => $row['Nama_Dept'],
            'Telp' => $row['Telp']
        ];
    }
    ?>
    var details = <?php echo json_encode($employeeDetails); ?>;
    document.getElementById('employee-details').innerHTML = `
        <strong>NAMA:</strong> ${name} <br>
        <strong>DEPARTMENT:</strong> ${details[name].Department} <br>
        <strong>TELP:</strong> ${details[name].Telp}
    `;
}
</script>

<?php include('template/footer.php'); ?>