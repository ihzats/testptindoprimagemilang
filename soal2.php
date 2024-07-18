<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .grid-container {
        display: grid;
        gap: 5px;
    }

    .grid-item {
        text-align: center;
        border: 1px solid #000;
        padding: 20px;
    }

    .empty-cell {
        background-color: #f8f9fa;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Soal 2</h2>
            <div>
                <a href=" index.php" class="btn btn-danger text-center">X</a>
            </div>
        </div>
        <form id="inputForm">
            <div class="form-group">
                <label for="dimension">Dimensi</label>
                <input type="number" class="form-control" id="dimension" min="3" max="9" required>
            </div>
            <div class="form-group">
                <label for="direction">Direction</label>
                <select class="form-control" id="direction" required>
                    <option value="Up-Down">Up-Down</option>
                    <option value="Down-Up">Down-Up</option>
                    <option value="Left-Right">Left-Right</option>
                    <option value="Right-Left">Right-Left</option>
                </select>
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <select class="form-control" id="value" required>
                    <option value="Alphabet">Alphabet</option>
                    <option value="Odd">Angka Ganjil</option>
                    <option value="Even">Angka Genap</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>
        <div id="gridOutput" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.getElementById('inputForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const dimension = parseInt(document.getElementById('dimension').value);
        const direction = document.getElementById('direction').value;
        const value = document.getElementById('value').value;
        const gridOutput = document.getElementById('gridOutput');

        gridOutput.innerHTML = '';

        const gridContainer = document.createElement('div');
        gridContainer.classList.add('grid-container');
        const adjustedDimension = dimension * 2 - 1; // Adjust dimension for diamond shape
        gridContainer.style.gridTemplateColumns = `repeat(${adjustedDimension}, auto)`;

        let values = [];
        if (value === 'Alphabet') {
            values = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        } else if (value === 'Odd') {
            values = Array.from({
                length: adjustedDimension * adjustedDimension
            }, (_, i) => 2 * i + 1);
        } else if (value === 'Even') {
            values = Array.from({
                length: adjustedDimension * adjustedDimension
            }, (_, i) => 2 * (i + 1));
        }

        const grid = Array.from({
            length: adjustedDimension
        }, () => Array(adjustedDimension).fill(''));
        let idx = 0;

        const isBoundaryOfDiamond = (i, j, dim) => {
            const distance = Math.abs(Math.floor(dim / 2) - i) + Math.abs(Math.floor(dim / 2) - j);
            return distance === Math.floor(dim / 2);
        };

        if (direction === 'Left-Right' || direction === 'Right-Left') {
            for (let row = 0; row < adjustedDimension; row++) {
                for (let col = 0; col < adjustedDimension; col++) {
                    if (isBoundaryOfDiamond(row, col, adjustedDimension)) {
                        if (direction === 'Left-Right') {
                            grid[row][col] = values[idx++];
                        } else {
                            grid[row][adjustedDimension - col - 1] = values[idx++];
                        }
                    }
                }
            }
        } else if (direction === 'Up-Down' || direction === 'Down-Up') {
            for (let row = 0; row < adjustedDimension; row++) {
                for (let col = 0; col < adjustedDimension; col++) {
                    if (isBoundaryOfDiamond(row, col, adjustedDimension)) {
                        if (direction === 'Up-Down') {
                            grid[row][col] = values[idx++];
                        } else {
                            grid[adjustedDimension - row - 1][col] = values[idx++];
                        }
                    }
                }
            }
        }

        for (let row = 0; row < adjustedDimension; row++) {
            for (let col = 0; col < adjustedDimension; col++) {
                const cell = document.createElement('div');
                cell.classList.add('grid-item');
                if (grid[row][col]) {
                    cell.textContent = grid[row][col];
                } else {
                    cell.classList.add('empty-cell');
                }
                gridContainer.appendChild(cell);
            }
        }

        gridOutput.appendChild(gridContainer);
    });
    </script>
</body>

</html>