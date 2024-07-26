<?php
include 'koneksi.php'; // Menyertakan file koneksi.php

// Query untuk mengambil data beasiswa yang tidak NULL
$query = "SELECT * FROM tbl_beasiswa WHERE beasiswa IS NOT NULL";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan Beasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'nav.php' ?>
<div class="container mt-5">
    <h2>Status Pengajuan Beasiswa</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nim']}</td>";
                    echo "<td>{$row['nama']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['no_hp']}</td>";
                    echo "<td>{$row['semester']}</td>";
                    echo "<td>{$row['ipk']}</td>";
                    echo "<td>{$row['beasiswa']}</td>";
                    echo "<td>";
                    if (!empty($row['berkas'])) {
                        $berkas_path = 'berkas/' . $row['berkas'];
                        if (file_exists($berkas_path)) {
                            echo '<img src="' . $berkas_path . '" width="70" height="70">';
                        } else {
                            echo 'Berkas tidak ada di server';
                        }
                    } else {
                        echo 'Berkas Kosong';
                    }
                    echo "</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>Tidak ada data yang tersedia</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer class="bg-primary text-white py-2 fixed-bottom">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 Beasiswa. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
