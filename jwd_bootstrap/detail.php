<?php
include 'koneksi.php';

// Mengambil ID pasien dari URL
$id_pasien = $_GET['id_pasien'];

// Mengambil data pasien dari database
$query = "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);

if (!$data) {
    die("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">RS Medika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pasien.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <h3 class="mb-4">Detail Pasien</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID Pasien:</strong> <?php echo $data['id_pasien']; ?></li>
                    <li class="list-group-item"><strong>Nama:</strong> <?php echo $data['nama_pasien']; ?></li>
                    <li class="list-group-item"><strong>Tanggal Lahir:</strong> <?php echo $data['tanggal_lahir_pasien']; ?></li>
                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> <?php echo $data['jenis_kelamin']; ?></li>
                    <li class="list-group-item"><strong>No. HP:</strong> <?php echo $data['nohp_pasien']; ?></li>
                    <li class="list-group-item"><strong>Golongan Darah:</strong> <?php echo $data['goldar_pasien']; ?></li>
                    <li class="list-group-item"><strong>Alamat:</strong> <?php echo $data['alamat_pasien']; ?></li>
                    <li class="list-group-item"><strong>Jenis:</strong> <?php echo $data['jenis']; ?></li>
                    <li class="list-group-item"><strong>Lama Perawatan:</strong> <?php echo $data['lama_perawatan']; ?> hari</li>
                    <li class="list-group-item"><strong>Total Tagihan:</strong> Rp. <?php echo $data['total_tagihan']; ?></li>
                    <li class="list-group-item">
                        <strong>Foto KTP:</strong>
                        <?php if (!empty($data['ktp'])): ?>
                            <img src="get_ktp.php?id_pasien=<?php echo $data['id_pasien']; ?>" alt="Foto KTP" style="width: 100px; height: auto;">
                        <?php else: ?>
                            Tidak ada
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
