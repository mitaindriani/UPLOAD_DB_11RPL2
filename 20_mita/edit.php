<?php
include('koneksi.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $nominal_bayar = $_POST['nominal_bayar'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $query = "UPDATE tb_pembayaran SET nama_siswa='$nama_siswa', kelas='$kelas', 
    jurusan='$jurusan', nominal_bayar='$nominal_bayar', tanggal='$tanggal', bulan='$bulan', tahun='$tahun' WHERE id='$id'";
    mysqli_query($koneksi, $query);

    header("Location: index.php");
}
