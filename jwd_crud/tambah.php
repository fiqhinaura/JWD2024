<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">RS Medika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pasien.php">Tampil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambah.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit.php">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cetaksemua.php" target="_blank">Cetak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <a href="pasien.php" class="btn btn-danger mb-4">Kembali</a>
        <h3 class="mb-4">TAMBAH DATA PASIEN</h3>
        <form method="post" action="tambah_aksi.php">
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID Pasien</label>
                <input type="text" name="id_pasien" class="form-control" id="id_pasien" required>
            </div>
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama</label>
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir_pasien" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir_pasien" class="form-control" id="tanggal_lahir_pasien" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin_laki" required>
                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin_perempuan" required>
                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="nohp_pasien" class="form-label">No. HP</label>
                <input type="number" name="nohp_pasien" class="form-control" id="nohp_pasien" required>
            </div>
            <div class="mb-3">
                <label for="goldar_pasien" class="form-label">Golongan Darah</label>
                <select name="goldar_pasien" class="form-select" id="goldar_pasien" required>
                    <option value="" disabled selected>Pilih Golongan Darah</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="alamat_pasien" class="form-label">Alamat</label>
                <textarea name="alamat_pasien" class="form-control" id="alamat_pasien" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <br>
        </form>
    </div>

    <footer class="fixed-bottom bg-primary text-white text-center py-1">RS Medika &copy; 2023</footer>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
