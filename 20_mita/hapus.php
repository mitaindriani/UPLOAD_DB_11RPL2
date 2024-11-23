<?php
include('koneksi.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM tb_pembayaran WHERE id='$id'";
    mysqli_query($koneksi, $query);

    header("Location: index.php");
}
