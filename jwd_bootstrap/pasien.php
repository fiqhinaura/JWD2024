<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
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
                        <a class="nav-link active" aria-current="page" href="pasien.php">Tampil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cetaksemua.php" target="_blank">Cetak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <h3 class="mb-4">DAFTAR PASIEN</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Golongan Darah</th>
                    <th>Alamat</th>
                    <th>Jenis</th>
                    <th>Lama Perawatan</th>
                    <th>Total Tagihan</th>
                    <th>Foto KTP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM pasien";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id_pasien']}</td>";
                    echo "<td>{$row['nama_pasien']}</td>";
                    echo "<td>{$row['tanggal_lahir_pasien']}</td>";
                    echo "<td>{$row['jenis_kelamin']}</td>";
                    echo "<td>{$row['nohp_pasien']}</td>";
                    echo "<td>{$row['goldar_pasien']}</td>";
                    echo "<td>{$row['alamat_pasien']}</td>";
                    echo "<td>{$row['jenis']}</td>";
                    echo "<td>{$row['lama_perawatan']} hari</td>";
                    echo "<td>Rp. {$row['total_tagihan']}</td>";

                    // Menampilkan gambar dari kolom `ktp`
                    if (!empty($row['ktp'])) {
                        // Tampilkan gambar dari `get_ktp.php`
                        $imageUrl = "get_ktp.php?id_pasien={$row['id_pasien']}";
                        echo "<td><img src='{$imageUrl}' alt='Foto KTP' style='width: 100px; height: auto;'></td>";
                    } else {
                        echo "<td>Tidak ada</td>";
                    }

                    echo "<td>
                            <a href='edit.php?id_pasien={$row['id_pasien']}' class='btn btn-warning btn-sm'>Edit</a>
                            <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='{$row['id_pasien']}'>Delete</button>
                          </td>";
                    echo "</tr>";

                }
                ?>
                <!-- Modal Konfirmasi Hapus -->
                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <form id="deleteForm" method="post" action="hapus.php">
                                    <input type="hidden" name="id_pasien" id="modalId">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </tbody>
        </table>
    </div>



    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript untuk mengatur ID pasien di modal -->
    <script>
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var modalId = deleteModal.querySelector('#modalId');
            modalId.value = id;
        });
    </script>
</body>

</html>