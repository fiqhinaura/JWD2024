<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pasien</title>
<link rel="stylesheet" href="style.css">
<body onload="window.print()">
<header>RS Medika</header>
    <section>

   
    <article>
    <div class="container">

        <?php
        include 'koneksi.php';
        if (isset($_GET['id_pasien'])) {
            $id_pasien = $_GET['id_pasien'];
            $data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <table class="table">
                    <tr>
                        <th>ID Pasien</th>
                        <td><?php echo $d['id_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $d['nama_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?php echo $d['tanggal_lahir_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $d['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td><?php echo $d['nohp_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Golongan Darah</th>
                        <td><?php echo $d['goldar_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $d['alamat_pasien']; ?></td>
                    </tr>
                </table>
                <?php
            }
        } else {
            echo "<p>Data pasien tidak ditemukan.</p>";
        }
        ?>

        <div class="footer">
            <p>RS Medika</p>
        </div>
    </div>
    </article>
    </section>
</body>
</html>
