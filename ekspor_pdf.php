<?php 
    require ("vendor/autoload.php");    // load file autoload.php dari composer
    require ("koneksi.php");            // load konfigurasi untuk koneksi ke DB

    use Dompdf\Dompdf;                  // panggil referensi namespace dari library Dompdf
    use Dompdf\Options;

    $html = '<h1>Data Anggota Perpustakaan Umum</h1>';
    $html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Anggota</th> 
                        <th>Nama</th> 
                        <th>Foto</th> 
                        <th>Jenis Kelamin</th> 
                        <th>Alamat</th> 
                    </tr>
                </thead>
                <tbody>';
    $nomor = 1; 
    $query = "SELECT * FROM tbanggota ORDER BY idanggota DESC"; 
    $q_tampil_anggota = mysqli_query($db, $query); 

    if(mysqli_num_rows($q_tampil_anggota) > 0) { 
        // looping semua data pada tabel tbanggota 
        while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)) { 
            if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
                $foto = "admin-no-photo.jpg"; 
            } else { 
                $foto = $r_tampil_anggota['foto']; 
            }
            $html .= '<tr>
                        <td>'.$nomor.'</td>
                        <td>'.$r_tampil_anggota['idanggota'].'</td>
                        <td>'.$r_tampil_anggota['nama'].'</td>
                        <td><img src="http://localhost/jwd_perpus/images/'.$foto.'" width="70px" height="70px"></td>
                        <td>'.$r_tampil_anggota['jeniskelamin'].'</td>
                        <td>'.$r_tampil_anggota['alamat'].'</td>
                    </tr>';  
                    $nomor++; 
        } // end looping 
    } else {
            $html .= '<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>';
    }         
            
    $html .= '</tbody></html>'; 
    // echo $html;

    $dompdf = new Dompdf();                         // instansiasi class Dompdf
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->loadHtml($html);                       // isi konten (format HTML) untuk dokumen pdf
    $dompdf->setPaper('a4','landscape');            // set ukuran dan orientasi dokumen pdf
    $dompdf->render();                              // vender kode HTML menjadi pdf
    $dompdf->stream('data_anggota_perpustakaan.pdf'); // stream pdf ke browser
?>       
    
