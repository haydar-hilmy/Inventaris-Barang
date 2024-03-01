<?php
// session_start();

// if (!isset($_SESSION['login'])) {
//     header("Location: index.php");
// }

// include 'php/function.php';

// $get_user = $_SESSION['login'];
// $query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
// $array_user = mysqli_fetch_array($query_user);

// $query_barang = mysqli_query($con, "SELECT *,(harga*stock) AS total_harga FROM stock");

// if (isset($_POST['tambah'])) {
//     if (TambahBarang($_POST) > 0) {
//         echo "<script>alert('Berhasil menambah barang!');window.location = 'barang.php';</script>";
//     } else {
//         echo "<script>alert('Oops! gagal menambah barang :(');window.location = 'barang.php';</script>";
//     }
// }

// if (isset($_POST['edit'])) {
//     if (EditBarang($_POST) > 0) {
//         echo "<script>alert('Berhasil mengedit barang!');window.location = 'barang.php';</script>";
//     } else {
//         echo "<script>alert('Oops! gagal mengedit barang :(');window.location = 'barang.php';</script>";
//     }
// }

// if (isset($_GET['cari'])) {
//     $pencarian = $_GET['cari'];
//     $query_barang = mysqli_query($con, "SELECT *,(harga*stock) AS total_harga FROM stock WHERE nama_barang LIKE '%$pencarian%' ORDER BY id ASC");
// }

?>

<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

<!-- START CONTENT -->
<div class="content">
    <i id="btn_show" class="fa-solid fa-bars btn_show"></i>
    <h3 class="title-content">Stock Barang</h3>

    <!-- START OPTION_TABLE -->
    <div class="table-pack">

        <div class="option-table">
            <div class="left">
                <button id="btn-add"><i class="fa-solid fa-plus"></i> Add</button>
            </div>

            <div class="right">
                <form method="get">
                    <input type="text" placeholder="search by nama barang" name="cari">
                    <button type="submit"><img src="assets/icon/search-alt-2-svgrepo-com.svg" alt="icon-search"></button>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="center-td">No.</th>
                    <th>Id</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Modified</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <!-- <tr>
                    <td class="center-td" colspan="10">Data Tidak Ditemukan</td>
                </tr> -->

                <?php if(!$barang){ ?>
                <tr>
                    <td class="center-td" colspan="10">Belum Ada Data</td>
                </tr>
                <?php } else ?>
                <?php  $i = 1; foreach ($barang as $key => $b) : ?>
                    <tr>
                        <td class="center-td"><?= $i++ ?></td>
                        <td class="id_barang"><?= $b->id ?></td>
                        <td><?= $b->nama_barang ?></td>
                        <td><?= $b->deskripsi ?></td>
                        <td><?= $b->stok ?></td>
                        <td><?= "Rp." . number_format($b->harga, '0', ',', '.') ?></td>
                        <td><?= "Rp." . number_format($b->total_harga, '0', ',', '.') ?></td>
                        <td><?= $b->modified ?></td>
                        <td><?= $b->created_at ?></td>
                        <td><img class="act-btn edit-btn" src="assets/icon/edit-3-svgrepo-com.svg"> | <img onclick="delete_data('idbarang', 'namabarang')" class="act-btn" src="assets/icon/delete-2-svgrepo-com.svg"></td>
                    </tr>
                <?php endforeach ?>

            </tbody>

        </table>

    </div>
    <!-- END OPTION_TABLE -->

</div>
<!-- END CONTENT -->


<!-- MODAL ADD FORM -->
<div class="modal-form" id="box-modal-form">
    <form method="post" action="barang/addbarang" class="box-modal-form">
        <span class="close-icon" id="close-icon-add">&times;</span>
        <h3>Tambah Barang</h3>

        <div>
            <label for="nama_barang">Nama Barang</label>
            <input autofocus placeholder="Nama Barang" name="nama_barang" id="nama_barang" type="text" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi Barang</label>
            <textarea placeholder="Deskripsi Barang" name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
        </div>

        <div>
            <label for="harga_barang">Harga Barang</label>
            <input placeholder="Harga Barang" type="number" min="1" step="0.01" name="harga_barang" id="harga_barang" required>
        </div>

        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
<!-- MODAL ADD FORM END -->

<!-- MODAL EDIT FORM -->
<div class="modal-form" id="box-modal-edit-form">
</div>
<!-- MODAL EDIT FORM END -->

<!-- MODAL ALERT -->
<div class="modal-alert" id="box-modal-alert">
    <div class="box-modal-alert">
        <div>
            <h3 id="txt-box-modal-alert">Anda yakin ingin menghapus?</h3>
        </div>
        <div class="btn-modal"><button id="yes-btn" class="box-green">Ya</button> <button id="cancel-btn" class="box-warn">Tidak</button></div>
    </div>
</div>

<script src="js/barang.js"></script>

<?= $this->endSection() ?>