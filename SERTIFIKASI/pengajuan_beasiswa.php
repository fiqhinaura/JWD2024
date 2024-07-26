<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Beasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include 'nav.php' ?>
<!-- container form -->
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
            <!-- dropdown select option sesuai value yang ada di enum db -->
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
            <div class="form-group">
                <p>     </p>
            </div>
            <br>
            <br>
            <br>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // nama function
        function validateEmail() {
            // mengambil nilai email berdasarkan id dan disimpan di emailInput
            const emailInput = document.getElementById('email');
            // value dari emailInput disimpan di cons email
            const email = emailInput.value;
            // untuk deklarasikan pattern yang sesuai
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            // cek apakah email sudah sesuai dengan emailpattern
            if (!emailPattern.test(email)) {
                // jika tidak akan muncul allert
                alert('Email tidak valid. Harap masukkan email yang benar.');
                emailInput.focus();
                return false;
            }
            return true;
        }

        function updateIPK() {
            // mengambil nilai input dan disimpan dalam variabel
            var nim = document.getElementById('nim').value;
            var ipkInput = document.getElementById('ipk');
            var beasiswaSelect = document.getElementById('beasiswa');
            var berkasInput = document.getElementById('berkas');
            
            // set ipk 0
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

            // var ipkinput valuenya diisi dengan ipk yang memenuhi percabangan diatas
            ipkInput.value = ipk;

        
            // Enable or disable kolom dari IPK
            if (ipk >= 3.0) {
                beasiswaSelect.disabled = false;
                berkasInput.disabled = false;
            } else {
                beasiswaSelect.disabled = true;
                berkasInput.disabled = true;
            }
        }

        //function validNomer
        function validNomer() {
            // mengambil input di no_hp dan disimpan di nohp
            var nohp = document.getElementById('no_hp').value;
            // cek percabangan panjang nohp itu gak boleh lebih dari 13
            if (nohp.length > 13) {
                // jika lebih dari 13 maka akan alert tidak valid
                alert('Nomor HP tidak valid');
                // dan inputan akan otomatis di kosongkan
                document.getElementById('no_hp').value = '';
            }
        }
    </script>
</body>

</html>
