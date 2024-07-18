<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body onload="updateRAIDOptions()">

    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Soal 1</h2>
            <div>
                <a href=" index.php" class="btn btn-danger text-center">X</a>
            </div>
        </div>
        <form>
            <div class="form-group">
                <label for="numberOfDisks">Input Number of Disk:</label>
                <input type="number" class="form-control" id="numberOfDisks" value="1"
                    onkeypress="validateNumber(event)" onchange="updateRAIDOptions()" min="1" max="8">
            </div>
            <div class="form-group">
                <label for="sizePerDisk">Input Size per Disk:</label>
                <select class="form-control" id="sizePerDisk">
                    <option value="300">300GB</option>
                    <option value="500">500GB</option>
                    <option value="1000">1TB</option>
                    <option value="2000">2TB</option>
                </select>
            </div>
            <div class="form-group">
                <label for="raidType">Input RAID Type:</label>
                <select class="form-control" id="raidType">
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <button type="button" class="btn btn-primary" onclick="calculateOutput()">Calculate</button>
        </form>
        <div class="mt-4">
            <h4>Output Capacity: <span id="outputCapacity">0 GB</span></h4>
            <h4>Output Fault Tolerance: <span id="outputFaultTolerance">0</span></h4>
            <p id="explanation"></p>
        </div>
    </div>
    <script>
    function validateNumber(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function updateRAIDOptions() {
        var numberOfDisks = document.getElementById("numberOfDisks").value;
        var raidType = document.getElementById("raidType");
        raidType.innerHTML = '';

        if (numberOfDisks >= 2) {
            raidType.innerHTML += '<option value="RAID-1">RAID-1</option>';
        }
        if (numberOfDisks >= 3) {
            raidType.innerHTML += '<option value="RAID-5">RAID-5</option>';
        }
        if (numberOfDisks >= 4 && numberOfDisks % 2 === 0) {
            raidType.innerHTML += '<option value="RAID-10">RAID-10</option>';
        }
        raidType.innerHTML += '<option value="RAID-0">RAID-0</option>';
    }

    function calculateOutput() {
        var numberOfDisks = parseInt(document.getElementById("numberOfDisks").value);
        var sizePerDisk = parseInt(document.getElementById("sizePerDisk").value);
        var raidType = document.getElementById("raidType").value;

        var outputCapacity = 0;
        var outputFaultTolerance = 0;

        switch (raidType) {
            case "RAID-0":
                outputCapacity = numberOfDisks * sizePerDisk;
                outputFaultTolerance = 0;
                break;
            case "RAID-1":
                outputCapacity = sizePerDisk;
                outputFaultTolerance = numberOfDisks - 1;
                break;
            case "RAID-5":
                outputCapacity = (numberOfDisks - 1) * sizePerDisk;
                outputFaultTolerance = 1;
                break;
            case "RAID-10":
                outputCapacity = (numberOfDisks / 2) * sizePerDisk;
                outputFaultTolerance = 1;
                break;
        }

        document.getElementById("outputCapacity").innerText = outputCapacity + " GB";
        document.getElementById("outputFaultTolerance").innerText = outputFaultTolerance;

        // Add explanation
        var explanation = "";
        if (raidType === "RAID-0") {
            explanation =
                "RAID-0 memiliki performa yang tinggi karena data disebar ke semua disk tanpa redundansi, tetapi tidak ada toleransi kesalahan.";
        } else if (raidType === "RAID-1") {
            explanation =
                "RAID-1 menduplikasi data ke semua disk, sehingga kapasitas penyimpanan setara dengan satu disk, tetapi memiliki toleransi kesalahan yang tinggi.";
        } else if (raidType === "RAID-5") {
            explanation =
                "RAID-5 menyebarkan data dan paritas ke semua disk. Jika satu disk gagal, data masih dapat direkonstruksi dari paritas.";
        } else if (raidType === "RAID-10") {
            explanation =
                "RAID-10 menggabungkan kelebihan RAID-0 dan RAID-1 dengan menyebarkan dan menduplikasi data, menyediakan performa dan toleransi kesalahan.";
        }
        document.getElementById("explanation").innerText = explanation;
    }
    </script>
</body>

</html>