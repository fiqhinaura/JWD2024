<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <!-- Link ke file CSS Bootstrap lokal -->
    <link rel="stylesheet" href="style.css">

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
                <h3>EDIT DATA PASIEN</h3>

                <?php
                include 'koneksi.php';
                $id_pasien = $_GET['id_pasien'];
                $data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <form method="post" action="update.php">
                        <table class="table">
                            <tr>
                                <td>ID Pasien</td>
                                <td>
                                    <input type="text" name="id_pasien" class="form-control"
                                        value="<?php echo $d['id_pasien']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama_pasien" class="form-control"
                                        value="<?php echo $d['nama_pasien']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><input type="date" name="tanggal_lahir_pasien" class="form-control"
                                        value="<?php echo $d['tanggal_lahir_pasien']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
                                            id="jenis_kelamin_laki" <?php echo ($d['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                            id="jenis_kelamin_perempuan" <?php echo ($d['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td><input type="number" name="nohp_pasien" class="form-control"
                                        value="<?php echo $d['nohp_pasien']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>
                                    <select name="goldar_pasien" class="form-select" required>
                                        <option value="" disabled>Pilih Golongan Darah</option>
                                        <option value="A+" <?php echo ($d['goldar_pasien'] == 'A+') ? 'selected' : ''; ?>>A+
                                        </option>
                                        <option value="B+" <?php echo ($d['goldar_pasien'] == 'B+') ? 'selected' : ''; ?>>B+
                                        </option>
                                        <option value="AB+" <?php echo ($d['goldar_pasien'] == 'AB+') ? 'selected' : ''; ?>>
                                            AB+</option>
                                        <option value="O+" <?php echo ($d['goldar_pasien'] == 'O+') ? 'selected' : ''; ?>>O+
                                        </option>
                                        <option value="A-" <?php echo ($d['goldar_pasien'] == 'A-') ? 'selected' : ''; ?>>A-
                                        </option>
                                        <option value="B-" <?php echo ($d['goldar_pasien'] == 'B-') ? 'selected' : ''; ?>>B-
                                        </option>
                                        <option value="AB-" <?php echo ($d['goldar_pasien'] == 'AB-') ? 'selected' : ''; ?>>
                                            AB-</option>
                                        <option value="O-" <?php echo ($d['goldar_pasien'] == 'O-') ? 'selected' : ''; ?>>O-
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea name="alamat_pasien" class="form-control" rows="3"
                                        required><?php echo $d['alamat_pasien']; ?></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="SIMPAN" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                <?php
                }
                ?>
            </div>

        </article>
    </section>
    <footer>RS Medika</footer>
</body>

</html>