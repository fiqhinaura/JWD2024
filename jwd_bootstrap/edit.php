<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
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
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="edit.php">Edit</a>
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
        <h3 class="mb-4">EDIT DATA PASIEN</h3>
        <?php
        include 'koneksi.php';
        $id_pasien = $_GET['id_pasien'];
        $data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="id_pasien" value="<?php echo $d['id_pasien']; ?>">
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama</label>
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" value="<?php echo $d['nama_pasien']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir_pasien" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir_pasien" class="form-control" id="tanggal_lahir_pasien" value="<?php echo $d['tanggal_lahir_pasien']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="Laki-laki" <?php if ($d['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?> required>
                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="Perempuan" <?php if ($d['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> required>
                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="nohp_pasien" class="form-label">No. HP</label>
                <input type="text" name="nohp_pasien" class="form-control" id="nohp_pasien" value="<?php echo $d['nohp_pasien']; ?>" onchange="validNomer" required>
            </div>
            <div class="mb-3">
                <label for="goldar_pasien" class="form-label">Golongan Darah</label>
                <input type="text" name="goldar_pasien" class="form-control" id="goldar_pasien" value="<?php echo $d['goldar_pasien']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat_pasien" class="form-label">Alamat</label>
                <textarea name="alamat_pasien" class="form-control" id="alamat_pasien" rows="3" required><?php echo $d['alamat_pasien']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="ktp" class="form-label">Foto KTP</label>
                <input type="file" name="ktp" class="form-control" id="ktp" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" class="form-select" id="jenis" required>
                    <option value="BPJS" <?php if ($d['jenis'] == 'BPJS') echo 'selected'; ?>>BPJS (biaya 0)</option>
                    <option value="Umum" <?php if ($d['jenis'] == 'Umum') echo 'selected'; ?>>Umum (biaya 157.000/hari)</option>
                    <option value="Pegawai" <?php if ($d['jenis'] == 'Pegawai') echo 'selected'; ?>>Pegawai (biaya 50.000/hari)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lama_perawatan" class="form-label">Lama Perawatan (hari)</label>
                <input type="number" name="lama_perawatan" class="form-control" id="lama_perawatan" value="<?php echo $d['lama_perawatan']; ?>" min="0" required>
            </div>
            <div class="mb-3">
                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                <input type="text" name="total_tagihan" class="form-control" id="total_tagihan" value="<?php echo $d['total_tagihan']; ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php
        }
        ?>
    </div>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('lama_perawatan').addEventListener('input', function () {
            var jenis = document.getElementById('jenis').value;
            var lamaPerawatan = parseInt(this.value) || 0;
            var biayaPerHari = 0;

            if (jenis === 'Umum') {
                biayaPerHari = 157000;
            } else if (jenis === 'Pegawai') {
                biayaPerHari = 50000;
            }

            var totalTagihan = biayaPerHari * lamaPerawatan;
            document.getElementById('total_tagihan').value = totalTagihan.toLocaleString();
        });

        document.getElementById('jenis').addEventListener('change', function () {
            var lamaPerawatan = document.getElementById('lama_perawatan').value;
            var jenis = this.value;
            var biayaPerHari = 0;

            if (jenis === 'Umum') {
                biayaPerHari = 157000;
            } else if (jenis === 'Pegawai') {
                biayaPerHari = 50000;
            }

            var totalTagihan = biayaPerHari * (parseInt(lamaPerawatan) || 0);
            document.getElementById('total_tagihan').value = totalTagihan.toLocaleString();
        });

        function validNomer() {
            var nohp = document.getElementById('nohp_pasien').value;
            if (nohp.length > 13) {
                alert('Nomor HP tidak valid');
                document.getElementById('nohp_pasien').value = '';
            }
        }

        document.getElementById('nohp_pasien').addEventListener('change', validNomer);
    </script>
</body>

</html>
