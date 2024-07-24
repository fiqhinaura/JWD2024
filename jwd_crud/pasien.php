<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Medika</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">RS Medika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pasien.php">Tampil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tampil.php">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cetaksemua.php" target="_blank">Cetak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Data Pasien</h3>
                    <a href="tambah.php" class="btn btn-success">+ TAMBAH PASIEN</a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pasien</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>No. HP</th>
                            <th>Golongan Darah</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
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
                                <td>
                                    <a href="edit.php?id_pasien=<?php echo $d['id_pasien']; ?>"
                                        class="btn btn-warning btn-sm">EDIT</a>
                                    <a href="cetak.php?id_pasien=<?php echo $d['id_pasien']; ?>" target="_blank"
                                        class="btn btn-info btn-sm">Cetak</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="<?php echo $d['id_pasien']; ?>">HAPUS</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="post" action="hapus.php">
                        <input type="hidden" name="id_pasien" id="modalId">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom bg-primary text-white text-center py-1">RS Medika &copy; 2023</footer>

    <!-- Link ke file JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button yang memicu modal
                var id = button.getAttribute('data-id'); // Ambil ID dari data attribute
                var form = document.getElementById('deleteForm');
                form.action = 'hapus.php?id_pasien=' + id; // Set action form dengan ID yang tepat
                var modalId = document.getElementById('modalId');
                modalId.value = id; // Set ID ke input hidden
            });
        });
    </script>
</body>

</html>