<?php
include 'koneksi.php';

if (isset($_GET['id_pasien'])) {
    $id_pasien = intval($_GET['id_pasien']);
    $query = "SELECT ktp FROM pasien WHERE id_pasien = $id_pasien";
    $result = mysqli_query($koneksi, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        header("Content-Type: image/jpeg"); // Sesuaikan dengan tipe gambar yang sebenarnya
        echo $row['ktp'];
    } else {
        echo "No image found.";
    }
} else {
    echo "No ID provided.";
}
?>
