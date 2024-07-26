<?php
include 'koneksi.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id_pasien = $_GET['id_pasien'];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menggabungkan sel A1 hingga J1
$sheet->mergeCells('A1:J1');
$sheet->setCellValue('A1', 'Laporan Pasien - ID Pasien: ' . $id_pasien);

// Menyeting format teks agar sel yang digabungkan berada di tengah
$sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:J1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$sheet->getStyle('A1:J1')->getFont()->setBold(true);
$sheet->getRowDimension('1')->setRowHeight(30); // Menyesuaikan tinggi baris jika diperlukan

// Menetapkan header di baris 2
$sheet->setCellValue('A2', 'ID Pasien');
$sheet->setCellValue('B2', 'Nama');
$sheet->setCellValue('C2', 'Tanggal Lahir');
$sheet->setCellValue('D2', 'Jenis Kelamin');
$sheet->setCellValue('E2', 'No. HP');
$sheet->setCellValue('F2', 'Golongan Darah');
$sheet->setCellValue('G2', 'Alamat');
$sheet->setCellValue('H2', 'Jenis');
$sheet->setCellValue('I2', 'Lama Perawatan');
$sheet->setCellValue('J2', 'Total Tagihan');

// Menetapkan data pasien di baris 3
$query = "SELECT * FROM pasien WHERE id_pasien = $id_pasien";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($result);

$sheet->setCellValue('A3', $row['id_pasien']);
$sheet->setCellValue('B3', $row['nama_pasien']);
$sheet->setCellValue('C3', $row['tanggal_lahir_pasien']);
$sheet->setCellValue('D3', $row['jenis_kelamin']);
$sheet->setCellValue('E3', $row['nohp_pasien']);
$sheet->setCellValue('F3', $row['goldar_pasien']);
$sheet->setCellValue('G3', $row['alamat_pasien']);
$sheet->setCellValue('H3', $row['jenis']);
$sheet->setCellValue('I3', $row['lama_perawatan'] . ' hari');
$sheet->setCellValue('J3', 'Rp. ' . $row['total_tagihan']);

// Mengatur lebar kolom agar lebih rapi
foreach (range('A', 'J') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);
$filename = 'data_pasien_' . $row['id_pasien'] . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
