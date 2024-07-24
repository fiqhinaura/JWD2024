<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>
<body>
    <header>RS Medika</header>
    <section>
      <nav>
        <ul>
          <li><a href="pasien.php">Tampil</a></li>
          <li><a href="tambah.php">Tambah</a></li>
          <li><a href="edit.php">Edit</a></li>
          <li><a href="cetaksemua.php">Cetak</a></li>
        </ul>
      </nav>
<article>
    <div class="container">
        <a href="pasien.php" class="btn btn-danger mb-3">Kembali</a>
        <h3>TAMBAH DATA PASIEN</h3>
        <form method="post" action="tambah_aksi.php">
            <table class="table">
                <tr>
                    <td>ID Pasien</td>
                    <td><input type="text" name="id_pasien" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_pasien" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="tanggal_lahir_pasien" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin_laki" required>
                            <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin_perempuan" required>
                            <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td><input type="number" name="nohp_pasien" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>
                        <select name="goldar_pasien" class="form-select" required>
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
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat_pasien" class="form-control" rows="3" required></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
    </section>
    </article>
    <footer>RS Medika</footer>

</body>
</html>
