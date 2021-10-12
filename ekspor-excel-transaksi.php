<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
 
// Load library phpspreadsheet
require('vendor/autoload.php');
 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet
 
$spreadsheet = new Spreadsheet();
 
// Set document properties
$spreadsheet->getProperties()->setCreator('Dewan Komputer')
->setLastModifiedBy('Dewan Komputer')
->setTitle('Office 2007 XLSX Dewan Komputer')
->setSubject('Office 2007 XLSX Dewan Komputer')
->setDescription('Test document for Office 2007 XLSX Dewan Komputer.')
->setKeywords('office 2007 openxml php Dewan Komputer')
->setCategory('Test result file Dewan Komputer');
 
$spreadsheet->getActiveSheet()->mergeCells('A1:F1');
$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Daftar Transaksi Si Perpustakaan Milik Osy');
 
 
//Font Color
$spreadsheet->getActiveSheet()->getStyle('A3:F3')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
 
// Background color
    $spreadsheet->getActiveSheet()->getStyle('A3:F3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFF0000');
 
 
// Header Tabel
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', 'NO')
->setCellValue('B3', 'ID TRANSAKSI')
->setCellValue('C3', 'ID ANGGOTA')
->setCellValue('D3', 'ID BUKU')
->setCellValue('E3', 'TANGGAL PINJAM')
->setCellValue('F3', 'TANGGAL KEMBALI')
;
 
$i=4; 
$no=1; 
$query = mysqli_query($db,"select * from tbtransaksi");
while ($row = mysqli_fetch_array($query)) {
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $no)
    ->setCellValue('B'.$i, $row['idtransaksi'])
	->setCellValue('C'.$i, $row['idanggota'])
	->setCellValue('D'.$i, $row['idbuku'])
	->setCellValue('E'.$i, $row['tglpinjam'])
	->setCellValue('F'.$i, $row['tglkembali']);
	$i++; $no++;
}
 
 
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
ob_end_clean();
// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tabel_anggota.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
 
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
 
?>