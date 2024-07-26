<?php
// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];

// Proses upload berkas
$nama_berkas = $_FILES['berkas']['name'];
$ukuran_berkas = $_FILES['berkas']['size'];
$tmp_berkas = $_FILES['berkas']['tmp_name'];
$ekstensi_boleh = array('pdf', 'jpg', 'zip');
$ukuran_boleh = 104857600; // 10MB
$direktori_berkas = 'berkas/'; // Folder untuk menyimpan berkas

// Mendapatkan ekstensi berkas dari nama berkas yang diupload
$explode_berkas = explode('.', $nama_berkas);
$ekstensi_berkas = strtolower(end($explode_berkas));

if (in_array($ekstensi_berkas, $ekstensi_boleh)) {
    // Cek ukuran berkas
    if ($ukuran_berkas <= $ukuran_boleh) {
        // Generate nama berkas unik dan upload
        $unique_name = time() . "_" . $nama_berkas;
        if (move_uploaded_file($tmp_berkas, $direktori_berkas . $unique_name)) {
            $berkas_path = $unique_name; // Simpan nama berkas yang diupload
        } else {
            echo "<script>
            alert('Terjadi kesalahan saat mengupload berkas');
            window.location = 'pengajuan_beasiswa.php';
            </script>";
            exit;
        }
    } else {
        echo "<script>
        alert('Ukuran berkas melebihi batas');
        window.location = 'pengajuan_beasiswa.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
    alert('Ekstensi berkas tidak diperbolehkan');
    window.location = 'pengajuan_beasiswa.php';
    </script>";
    exit;
}

// Menginput data ke database
$query = "INSERT INTO tbl_beasiswa (nim, nama, email, no_hp, semester, ipk, beasiswa, berkas) 
VALUES ('$nim', '$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$berkas_path')";

if (mysqli_query($koneksi, $query)) {
    header("Location: status_pengajuan.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
