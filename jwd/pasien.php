<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Medika</title>
    <link rel="stylesheet" href="style.css"> <!-- link to your custom CSS file -->
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
            <a href="tambah.php">+ TAMBAH PASIEN</a>
            <table>
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Golongan Darah</th>
                    <th>Alamat</th>
                    <th>KTP/KIA</th>
                    <th>OPSI</th>
                </tr>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM pasien");
                while ($d = mysqli_fetch_array($data)) {
               ?>
                <tr>
                    <td><?php echo $d['id_pasien'];?></td>
                    <td><?php echo $d['nama_pasien'];?></td>
                    <td><?php echo $d['tanggal_lahir_pasien'];?></td>
                    <td><?php echo $d['jenis_kelamin'];?></td>
                    <td><?php echo $d['nohp_pasien'];?></td>
                    <td><?php echo $d['goldar_pasien'];?></td>
                    <td><?php echo $d['alamat_pasien'];?></td>
                    <td><?php echo $d['ktp'];?></td>
                    <td>
                        <a href="edit.php?id_pasien=<?php echo $d['id_pasien'];?>" >EDIT</a>
                        <a href="cetak.php?id_pasien=<?php echo $d['id_pasien']; ?>" target="_blank">Cetak</a>
                        <a href="hapus.php?id_pasien=<?php echo $d['id_pasien'];?>" >HAPUS</a>
                    </td>
                </tr>
                <?php
                }
               ?>
            </table>
        </div>
        </section>
    </article>
   
    <footer>RS Medika</footer>
</body>
</html>