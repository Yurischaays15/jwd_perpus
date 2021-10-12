<?php 
    include "../koneksi.php"; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 

    $id_buku = $_GET['id']; 
    $q_tampil_buku = mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku = '$id_buku'"); 
    $r_tampil_buku = mysqli_fetch_array($q_tampil_buku); 

    if(empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) { 
        $cover = "book-no-photo.jpg"; 
    } else { 
        $cover = $r_tampil_buku['cover'];
    }
?> 
<div id="label-page"><h3>Kartu buku</h3></div> 
<div id="content"> 
    <table id="tabel-input"> 
        <tr> 
            <td class="label-formulir">Cover</td> 
            <td class="isian-formulir"><img src="../images/<?php echo $cover; ?>" width="70px" height="75px"></td> 
        </tr> 
        <tr>
            <td class="label-formulir">ID Buku</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku['idbuku']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Judul</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku['judul']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Penulis</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku['penulis']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Penerbit</td>
            <td class="isian-formulir"><?php echo $r_tampil_buku['penerbit']; ?></td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>