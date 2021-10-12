<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Transaksi</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</td>
            <th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>ID Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC";
        $q_tampil_anggota = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_anggota) > 0) {
            while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_anggota['idtransaksi']; ?></td>
                    <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                    <td><?php echo $r_tampil_anggota['idbuku']; ?></td>
                    <td><?php echo $r_tampil_anggota['tglpinjam']; ?></td>
                    <td><?php echo $r_tampil_anggota['tglkembali']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>