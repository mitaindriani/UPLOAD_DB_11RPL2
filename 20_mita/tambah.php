<?php
$koneksi = mysqli_connect("localhost", "root", "", "spp2");
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$nominal_bayar = $_POST['nominal_bayar'];
$tanggal = $_POST['tanggal'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

$query = mysqli_query($koneksi, "insert into tb_pembayaran (nama_siswa,kelas,jurusan,nominal_bayar,tanggal,bulan,tahun) 
values('$nama_siswa','$kelas','$jurusan','$nominal_bayar','$tanggal','$bulan','$tahun')");

if ($query) {
    header("Location: index.php");
} else {
    echo "Query Tidak Ok";
}
