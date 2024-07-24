<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pasien</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container mt-5">
        <header class="mb-4">
            <h1 class="text-center">RS Medika</h1>
        </header>

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
                            <table class="table table-bordered">
                                <tbody>
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
                                    <tr>
                                        <th>Jenis</th>
                                        <td><?php echo $d['jenis']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Lama Perawatan</th>
                                        <td><?php echo $d['lama_perawatan']; ?> hari</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tagihan</th>
                                        <td>Rp. <?php echo $d['total_tagihan']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                    } else {
                        echo "<p>Data pasien tidak ditemukan.</p>";
                    }
                    ?>
                </div>
            </article>
        </section>

        <footer class="mt-4 text-center no-print">
            <button class="btn btn-primary" onclick="window.print()">Cetak</button>
        </footer>
    </div>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
