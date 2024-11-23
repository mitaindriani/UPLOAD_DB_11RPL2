<?php
$koneksi = mysqli_connect("localhost", "root", "", "spp2");
$query = mysqli_query($koneksi, "select * from tb_pembayaran");
while ($row = mysqli_fetch_array($query)) {
    echo $row['nama_siswa'] . "<br>";
}
