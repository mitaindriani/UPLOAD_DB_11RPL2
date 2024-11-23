<?php
// include('koneksi.php');
$koneksi = mysqli_connect("localhost", "root", "", "spp2");
?>
<html>

<head>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            Pembayaran SPP
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_modal">
                Tambah Data Baru
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Nominal Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "select * from tb_pembayaran");
                    $no = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_siswa'] . "</td>";
                        echo "<td>" . $row['kelas'] . "</td>";
                        echo "<td>" . $row['jurusan'] . "</td>";
                        echo "<td>" . $row['nominal_bayar'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['bulan'] . "</td>";
                        echo "<td>" . $row['tahun'] . "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-success btn-sm editBtn' data-id='" . $row['id'] . "' data-nama_siswa='" . $row['nama_siswa'] . "' data-kelas='" . $row['kelas'] . "' data-jurusan='" . $row['jurusan'] . "' data-nominal_bayar='" . $row['nominal_bayar'] .  "' data-tanggal='" . $row['tanggal'] . "' data-bulan='" . $row['bulan'] . "' data-tahun='" . $row['tahun'] . "'>Edit</button> ";
                        echo "<button class='btn btn-danger btn-sm deleteBtn' data-id='" . $row['id'] . "'>Hapus</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="tambah.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NAMA SISWA</label>
                            <input type="text" name="nama_siswa" class="form-control" placeholder="masukkan nama siswa">
                        </div>
                        <div class="form-group">
                            <label>KELAS</label>
                            <select name="kelas" id="kelas" class="form-control"> 
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>JURUSAN</label>
                        <select name="jurusan" id="jurusan" class="form-control"> 
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TKR">TKR</option>
                            <option value="TBSM">TBSM</option>
                            <option value="TEI">TEI</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>NOMINAL PEMBAYARAN</label>
                            <input type="text" name="nominal_bayar" class="form-control" placeholder="Masukkan nominal">
                        </div>
                        <div class="form-group">
                            <label>TANGGAL</label>
                            <input type="number" name="tanggal" class="form-control" placeholder="Masukkan tanggal">
                        </div>
                        <div class="form-group">
                            <label>BULAN</label>
                            <input type="text" name="bulan" class="form-control" placeholder="Masukkan bulan">
                        </div>
                        <div class="form-group">
                            <label>TAHUN</label>
                            <input type="number" name="tahun" class="form-control" placeholder="Masukkan tahun">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pembayaran SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="edit.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label>NAMA SISWA</label>
                            <input type="text" name="nama_siswa" id="edit_nama_siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KELAS</label>
                            <select name="kelas" id="edit_kelas" class="form-control"> 
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>JURUSAN</label>
                        <select name="jurusan" id="edit_jurusan" class="form-control"> 
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TKR">TKR</option>
                            <option value="TBSM">TBSM</option>
                            <option value="TEI">TEI</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>NOMINAL PEMBAYARAN</label>
                            <input type="text" name="nominal_bayar" id="edit_nominal_bayar" class="form-control" placeholder="Masukkan nominal">
                        </div>
                        <div class="form-group">
                            <label>TANGGAL</label>
                            <input type="number" name="tanggal" id="edit_tanggal" class="form-control" placeholder="Masukkan tanggal">
                        </div>
                        <div class="form-group">
                            <label>BULAN</label>
                            <input type="text" name="bulan" id="edit_bulan" class="form-control" placeholder="Masukkan bulan">
                        </div>
                        <div class="form-group">
                            <label>TAHUN</label>
                            <input type="number" name="tahun" id="edit_tahun" class="form-control" placeholder="Masukkan tahun">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="hapus.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Edit button click event
            $('.editBtn').on('click', function() {
                $('#edit_modal').modal('show');

                // Get data from button and populate modal fields
                var id = $(this).data('id');
                var nama_siswa = $(this).data('nama_siswa');
                var kelas = $(this).data('kelas');
                var jurusan = $(this).data('jurusan');
                var nominal_bayar = $(this).data('nominal_bayar');
                var tanggal = $(this).data('tanggal');
                var bulan = $(this).data('bulan');
                var tahun = $(this).data('tahun');

                $('#edit_id').val(id);
                $('#edit_nama_siswa').val(nama_siswa);
                $('#edit_kelas').val(kelas);
                $('#edit_jurusan').val(jurusan);
                $('#edit_nominal_bayar').val(nominal_bayar);
                $('#edit_tanggal').val(tanggal);
                $('#edit_bulan').val(bulan);
                $('#edit_tahun').val(tahun);
            });

            // Delete button click event
            $('.deleteBtn').on('click', function() {
                $('#delete_modal').modal('show');

                var id = $(this).data('id');
                $('#delete_id').val(id);
            });
        });
    </script>

</body>

</html>