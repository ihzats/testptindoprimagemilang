<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="assets/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo-container img {
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center p-4">Test PT Indoprima Gemilang</h1>
        <div class="logo-container">
            <img src="assets/img/logoindoprima.png" alt="logo">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Soal 1</h5>
                        <div class="lh-1">
                            <p class="mb-0">Konfigurasi RAID </p>
                            <p>(Redundant Array of Independent Disks)</p>
                        </div>
                        <a href=" soal1.php" class="btn btn-primary">Check</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Soal 2</h5>
                        <div class="lh-1">
                            <p class="mb-0">Matrix</p>
                            <p>(Ganjil, Genap, Alphabet)</p>
                        </div>
                        <a href="soal2.php" class="btn btn-primary">Check</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Soal 3</h5>
                        <div class="lh-1">
                            <p class="mb-0">CRUD</p>
                            <p>(Bio Karyawan)</p>
                        </div>
                        <a href="soal3.php" class="btn btn-primary">Check</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>