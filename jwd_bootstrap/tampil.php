<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Medika</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">RS Medika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pasien.php">Tampil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tampil.php">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cetaksemua.php" target="_blank">Cetak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
                echo "Menggunakan for loop:<br>";
                for ($i = -100; $i <= 10; $i++) {
                    echo $i . " ";
                }
                echo "<br><br>";
                ?>

                <?php
                echo "Menggunakan while loop:<br>";
                $i = -100;
                while ($i <= 10) {
                    echo $i . " ";
                    $i++;
                }
                echo "<br><br>";
                ?>

                <?php
                echo "Menggunakan do while loop:<br>";
                $i = -100;
                do {
                    echo $i . " ";
                    $i++;
                } while ($i <= 10);
                ?>

<footer class="fixed-bottom bg-primary text-white text-center py-1">RS Medika &copy; 2023</footer>

<!-- Link ke file JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>