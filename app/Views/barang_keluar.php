<?php
// session_start();

// if (!isset($_SESSION['login'])) {
//     header("Location: index.php");
// }

// include 'php/function.php';

// $get_user = $_SESSION['login'];
// $query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
// $array_user = mysqli_fetch_array($query_user);

// $query_barang_keluar = mysqli_query($con, "SELECT stock.id AS 'id_barang', barang_keluar.id AS 'id_transaksi', stock.nama_barang, barang_keluar.qty, barang_keluar.harga, barang_keluar.penerima, barang_keluar.tanggal, barang_keluar.modified, barang_keluar.total_harga FROM stock JOIN barang_keluar ON stock.id = barang_keluar.id_barang ORDER BY barang_keluar.tanggal ASC, barang_keluar.id ASC");
// $query_barang = mysqli_query($con, "SELECT * FROM stock");

// if (isset($_POST['tambah'])) {
//     if (TambahBarangKeluar($_POST) > 0) {
//         echo "<script>alert('Berhasil menambah transaksi keluar!');window.location = 'barang_keluar.php';</script>";
//     } else {
//         echo "<script>alert('Oops! gagal menambah transaksi :(');window.location = 'barang_keluar.php';</script>";
//     }
// }

// if (isset($_GET['cari'])) {
//     $pencarian = $_GET['cari'];
//     $query_barang_keluar = mysqli_query($con, "SELECT stock.id AS 'id_barang', barang_keluar.id AS 'id_transaksi', stock.nama_barang, barang_keluar.qty, barang_keluar.harga, barang_keluar.penerima, barang_keluar.tanggal, barang_keluar.modified, barang_keluar.total_harga FROM stock JOIN barang_keluar ON stock.id = barang_keluar.id_barang WHERE barang_keluar.tanggal LIKE '%$pencarian%' ORDER BY barang_keluar.id ASC");
// }

?>

<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

<!-- START CONTENT -->
<div class="content">
    <i id="btn_show" class="fa-solid fa-bars btn_show"></i>
    <h3 class="title-content">Barang Keluar</h3>

    <!-- START OPTION_TABLE -->
    <div class="table-pack">

        <div class="option-table">
            <div class="left">
                <button id="btn-add"><i class="fa-solid fa-plus"></i> Add</button>
            </div>

            <div class="right">
                <form method="get">
                    <input type="date" placeholder="search" name="cari">
                    <button type="submit"><img src="assets/icon/search-alt-2-svgrepo-com.svg" alt="icon-search"></button>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="center-td">No.</th>
                    <th>ID Transaksi</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Penerima</th>
                    <th>Modified</th>
                    <th>Tanggal</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>

            <tbody>
                    <tr>
                        <td class="center-td" colspan="10">Data Tidak Ditemukan</td>
                    </tr>
                    <tr>
                        <td class="center-td" colspan="10">Belum Ada Data</td>
                    </tr>
                    <tr>
                        <td class="center-td">1</td>
                        <td class="id_transaksi">id transaksi</td>
                        <td class="id_barang">id barang</td>
                        <td>nama barang</td>
                        <td>22</td>
                        <td>10.000</td>
                        <td>220.000</td>
                        <td>iam penerima</td>
                        <td>admin</td>
                        <td>9 april 2004</td>
                        <!-- <td class="center-td"><img class="act-btn delete-btn" src="assets/icon/delete-2-svgrepo-com.svg"></td> -->
                    </tr>
            </tbody>

        </table>

    </div>
    <!-- END OPTION_TABLE -->

</div>
<!-- END CONTENT -->


<!-- MODAL ADD FORM -->
<div class="modal-form" id="box-modal-form">
    <form method="post" class="box-modal-form">
        <span class="close-icon" id="close-icon-add">&times;</span>
        <h3>Barang Keluar</h3>

        <input type="hidden" name="admin" value="username">

        <div>
            <label for="nama">Nama Barang</label>
            <select name="id_barang" id="id_barang" required>
                <option value="" disabled selected>Select Barang</option>
                    <option value="id barang | nama barang"></option>
            </select>
        </div>

        <div id="show-data-barang">

        </div>

        <div>
            <button name="tambah" type="submit">Tambah</button>
        </div>

    </form>
</div>
<!-- MODAL ADD FORM END -->

<!-- MODAL ALERT -->
<div class="modal-alert" id="box-modal-alert">
    <div class="box-modal-alert">
        <div>
            <h3>Anda yakin ingin menghapus?</h3>
        </div>
        <div class="btn-modal"><button id="yes-btn" class="box-green">Ya</button> <button id="cancel-btn" class="box-warn">Tidak</button></div>
    </div>
</div>
<script src="js/barang_keluar.js"></script>

<?= $this->endSection() ?>