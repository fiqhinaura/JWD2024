<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Semua Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h2>Data Semua Pasien</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Golongan Darah</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM pasien");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $d['id_pasien']; ?></td>
                    <td><?php echo $d['nama_pasien']; ?></td>
                    <td><?php echo $d['tanggal_lahir_pasien']; ?></td>
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                    <td><?php echo $d['nohp_pasien']; ?></td>
                    <td><?php echo $d['goldar_pasien']; ?></td>
                    <td><?php echo $d['alamat_pasien']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="footer">
            <p>RS Medika</p>
        </div>
    </div>
</body>
</html>
