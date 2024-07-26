<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Beasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Beasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link " href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengajuan_beasiswa.php">Pengajuan</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="status_pengajuan.php">Status <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container mt-5">
        <h2>Form Pengajuan Beasiswa</h2>
        <form action="tambah_aksi.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required onchange="updateIPK()">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" onchange="validNomer()" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select class="form-control" id="semester" name="semester" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" required readonly>
            </div>
            <div class="form-group">
                <label for="beasiswa">Jenis Beasiswa</label>
                <select class="form-control" id="beasiswa" name="beasiswa" disabled>
                    <option value="Pertamina">Pertamina</option>
                    <option value="LPDP">LPDP</option>
                    <option value="Djarum">Djarum</option>
                    <option value="KIPK">KIPK</option>
                </select>
            </div>
            <div class="form-group">
                <label for="berkas">Upload Berkas</label>
                <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf,.jpg,.zip">
            </div>
            <button type="submit" class="btn btn-primary" id="ajukan">Ajukan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateEmail() {
            const emailInput = document.getElementById('email');
            const email = emailInput.value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Email tidak valid. Harap masukkan email yang benar.');
                emailInput.focus();
                return false;
            }
            return true;
        }

        function updateIPK() {
            var nim = document.getElementById('nim').value;
            var ipkInput = document.getElementById('ipk');
            var beasiswaSelect = document.getElementById('beasiswa');
            var berkasInput = document.getElementById('berkas');
            
            let ipk = 0;

            if (nim === '101') {
                ipk = 3.7;
            } else if (nim === '102') {
                ipk = 2.8;
            } else if (nim === '103') {
                ipk = 3.8;
            } else if (nim === '104') {
                ipk = 2.4;
            } else if (nim === '105') {
                ipk = 3.1;
            } else if (nim === '106') {
                ipk = 2.8;
            } else if (nim === '107') {
                ipk = 3.8;
            } else if (nim === '108') {
                ipk = 3.8;
            } else if (nim === '109') {
                ipk = 3.8;
            } else if (nim === '110') {
                ipk = 3.8;
            } else if (nim === '111') {
                ipk = 3.8;
            } else if (nim === '112') {
                ipk = 3.8;
            }

            ipkInput.value = ipk;

            // Enable or disable fields based on IPK
            if (ipk >= 3.0) {
                beasiswaSelect.disabled = false;
                berkasInput.disabled = false;
            } else {
                beasiswaSelect.disabled = true;
                berkasInput.disabled = true;
            }
        }

        function validNomer() {
            var nohp = document.getElementById('no_hp').value;
            if (nohp.length > 13) {
                alert('Nomor HP tidak valid');
                document.getElementById('no_hp').value = '';
            }
        }
    </script>
</body>

</html>
