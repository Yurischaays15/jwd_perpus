<?php
require("vendor/autoload.php");
require("koneksi.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($db,"select * from tbtransaksi");
$html = '<html><center><h3>Daftar Transaksi Si Perpustakaan Milik Osy</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID Transaksi</th>
 <th>ID Anggota</th>
 <th>ID Buku</th>
 <th>Tanggal Pinjam</th>
 <th>Tanggal Kembali</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= '<tr>
 <td>'.$row['idtransaksi'].'</td>
 <td>'.$row['idanggota'].'</td>
 <td>'.$row['idbuku'].'</td>
 <td>'.$row['tglpinjam'].'</td>
 <td>'.$row['tglkembali'].'</td>
 </tr>';
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tabel_transaksi.pdf');
?>