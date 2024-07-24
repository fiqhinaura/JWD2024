<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- INI JUDUL -->
    <title>Tambah Data Pasien</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- INI NAVBAR -->
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

    <!-- MULAI FORM INPUT -->
    <div class="container mb-5">
        <!-- BUTTON KEMBALI KE PASIEN -->
        <a href="pasien.php" class="btn btn-danger mb-4">Kembali</a>
        <h3 class="mb-4">TAMBAH DATA PASIEN</h3>
        <!-- UNTUK AKSI TAMBAH -->
        <form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
            <!-- MASUKKAN ID PASIEN -->
            <div class="mb-3">
                <label for="id_pasien" class="form-label">ID Pasien</label>
                <input type="text" name="id_pasien" class="form-control" id="id_pasien" required>
            </div>
            <!-- MASUKKAN NAMA TIPE TEXT -->
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama</label>
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
            </div>
            <!-- MASUKKAN TGL TIPE DATE -->
            <div class="mb-3">
                <label for="tanggal_lahir_pasien" class="form-label">Tanggal Lahir</label>
                <!-- date ymd untuk set date sekarang -->
                <!-- kalo mau input bebas value di hilangkan -->
                <input type="date" name="tanggal_lahir_pasien" class="form-control" id="tanggal_lahir_pasien"
                    value="<?php echo date('Y-m-d') ?>" required>
            </div>
            <!-- JENIS KELAMIN DENGAN RADIO BTN -->
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki"
                        value="Laki-laki" required>
                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan"
                        value="Perempuan" required>
                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                </div>
            </div>
            <!-- NO HP DENGAN TIPE NUMBER -->
            <div class="mb-3">
                <label for="nohp_pasien" class="form-label">No. HP</label>
                <input type="number" name="nohp_pasien" class="form-control" id="nohp_pasien" onchange="validNomer"
                    required>
            </div>
            <!-- GOLDAR DENGAN SELECT OPTION -->
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
            <!-- ALAMAT DENGAN TEXTAREA -->
            <div class="mb-3">
                <label for="alamat_pasien" class="form-label">Alamat</label>
                <textarea name="alamat_pasien" class="form-control" id="alamat_pasien" rows="3" required></textarea>
            </div>
            <!-- KTP DENGAN TIPE FILE UNTUK FOTO KTP -->
            <div class="mb-3">
                <label for="ktp" class="form-label">Foto KTP</label>
                <input type="file" name="ktp" class="form-control" id="ktp" accept="image/*">
            </div>
            <!-- JENIS DENGAN SELECT OPTION LABEL JENIS -->
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" class="form-select" id="jenis" required>
                    <option value="BPJS">BPJS (biaya 0)</option>
                    <option value="Umum">Umum (biaya 157.000/hari)</option>
                    <option value="Pegawai">Pegawai (biaya 50.000/hari)</option>
                </select>
                <div class="mt-2">
                    <label for="harga_per_malam" class="form-label">Harga Per Malam</label>
                    <input type="text" id="harga_per_malam" class="form-control" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label for="lama_perawatan" class="form-label">Lama Perawatan (hari)</label>
                <input type="number" name="lama_perawatan" class="form-control" id="lama_perawatan" min="0" required>
            </div>
            <div class="mb-3">
                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                <input type="text" name="total_tagihan" class="form-control" id="total_tagihan" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function updatePricing() {
            var jenis = document.getElementById('jenis').value;
            var lamaPerawatan = parseInt(document.getElementById('lama_perawatan').value) || 0;
            var biayaPerHari = 0;

            if (jenis === 'Umum') {
                biayaPerHari = 157000;
            } else if (jenis === 'Pegawai') {
                biayaPerHari = 50000;
            } else if (jenis === 'BPJS') {
                biayaPerHari = 0;
            }

            document.getElementById('harga_per_malam').value = biayaPerHari.toLocaleString();
            document.getElementById('total_tagihan').value = (biayaPerHari * lamaPerawatan).toLocaleString();
        }

        document.getElementById('lama_perawatan').addEventListener('input', updatePricing);
        document.getElementById('jenis').addEventListener('change', updatePricing);

        // Initialize pricing on page load
        updatePricing();

        // fungsi validasi nomer hp
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