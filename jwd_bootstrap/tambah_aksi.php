<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$tanggal_lahir_pasien = $_POST['tanggal_lahir_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nohp_pasien = $_POST['nohp_pasien'];
$goldar_pasien = $_POST['goldar_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$jenis = $_POST['jenis'];
$lama_perawatan = $_POST['lama_perawatan'];
$total_tagihan = $_POST['total_tagihan'];

// proses upload foto KTP
$nama_ktp = $_FILES['ktp']['name'];
$ukuran_ktp = $_FILES['ktp']['size'];
$explode_ktp = explode('.', $nama_ktp);
$ekstensi_ktp = strtolower(end($explode_ktp));
$tmp_ktp = $_FILES['ktp']['tmp_name'];
$ekstensi_boleh = array('jpg', 'jpeg', 'png');
$ukuran_boleh = 1028000; // ini sama aja 1MB
$direktori_ktp = 'ktp/'; // slash agar foto masuk ke folder

// cek foto KTP
if (in_array($ekstensi_ktp, $ekstensi_boleh)) {
    // cek ukuran
    if ($ukuran_ktp <= $ukuran_boleh) {
        // upload
        $unique_name = time() . "_" . $nama_ktp;
        if (move_uploaded_file($tmp_ktp, $direktori_ktp . $unique_name)) {
            $ktp_path = $direktori_ktp . $unique_name;
        } else {
            echo "<script>
            window.alert('Terjadi kesalahan saat mengupload foto');
            window.location = '';
            </script>";
            exit;
        }
    } else {
        echo "<script>
        window.alert('Ukuran foto melebihi batas');
        window.location = '';
        </script>";
        exit;
    }
} else {
    echo "<script>
    window.alert('Ekstensi foto tidak diperbolehkan');
    window.location = '';
    </script>";
    exit;
}

// menginput data ke database
$query = "INSERT INTO pasien (id_pasien, nama_pasien, tanggal_lahir_pasien, jenis_kelamin, nohp_pasien, 
goldar_pasien, alamat_pasien, ktp, jenis, lama_perawatan, total_tagihan) 
VALUES ('$id_pasien', '$nama_pasien', '$tanggal_lahir_pasien', '$jenis_kelamin', '$nohp_pasien', 
'$goldar_pasien', '$alamat_pasien', '$ktp_path', '$jenis', '$lama_perawatan', '$total_tagihan')";

if (mysqli_query($koneksi, $query)) {
    header("location: pasien.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
