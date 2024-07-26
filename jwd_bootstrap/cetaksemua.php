<?php
include 'koneksi.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menggabungkan sel A1 hingga J1
$sheet->mergeCells('A1:J1');
$sheet->setCellValue('A1', 'Laporan Pasien');

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

// Mengatur format header
$sheet->getStyle('A2:J2')->getFont()->setBold(true);
$sheet->getStyle('A2:J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$sheet->getStyle('A2:J2')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

// Mengisi data pasien mulai dari baris 3
$rowNum = 3;
$no = 1;
$query = "SELECT * FROM pasien";
$result = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $rowNum, $row['id_pasien']);
    $sheet->setCellValue('B' . $rowNum, $row['nama_pasien']);
    $sheet->setCellValue('C' . $rowNum, $row['tanggal_lahir_pasien']);
    $sheet->setCellValue('D' . $rowNum, $row['jenis_kelamin']);
    $sheet->setCellValue('E' . $rowNum, $row['nohp_pasien']);
    $sheet->setCellValue('F' . $rowNum, $row['goldar_pasien']);
    $sheet->setCellValue('G' . $rowNum, $row['alamat_pasien']);
    $sheet->setCellValue('H' . $rowNum, $row['jenis']);
    $sheet->setCellValue('I' . $rowNum, $row['lama_perawatan'] . ' hari');
    $sheet->setCellValue('J' . $rowNum, 'Rp. ' . $row['total_tagihan']);
    $rowNum++;
    $no++;
}

// Mengatur lebar kolom agar lebih rapi
foreach (range('A', 'J') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);
$filename = 'data_pasien_semua.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>