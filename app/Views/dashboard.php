<?php


// include 'php/function.php';

// $get_user = $_SESSION['login'];
// $query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
// $array_user = mysqli_fetch_array($query_user);

// $query_barang_minimum = mysqli_query($con, "SELECT *
// FROM stock
// ORDER BY stock ASC;");

// $query_barang_harga = mysqli_query($con, "SELECT *
// FROM stock
// ORDER BY id ASC
// LIMIT 10;");

// $query_barang_masuk = mysqli_query($con, "SELECT SUM(total_harga) AS 'total_masuk' FROM barang_masuk JOIN stock ON stock.id = barang_masuk.id_barang");
// $total_barang_masuk = mysqli_fetch_array($query_barang_masuk);

// $query_barang_keluar = mysqli_query($con, "SELECT SUM(total_harga) AS 'total_keluar' FROM barang_keluar JOIN stock ON stock.id = barang_keluar.id_barang");
// $total_barang_keluar = mysqli_fetch_array($query_barang_keluar);


// $currentMonth = date('m');
// $currentYear = date('Y');
// // $query_tren_barang_keluar = mysqli_query($con, "SELECT * FROM barang_keluar WHERE MONTH(tanggal) = $currentMonth AND YEAR(tanggal) = $currentYear ORDER BY tanggal, id ASC");
// $query_tren_barang_keluar = mysqli_query($con, "SELECT MAX(id) AS max_id, tanggal, SUM(qty) AS total_jumlah FROM barang_keluar WHERE MONTH(tanggal) = $currentMonth AND YEAR(tanggal) = $currentYear GROUP BY tanggal ORDER BY tanggal ASC");


?>

<?= $this->extend('template/main') ?>


<?= $this->section('content') ?>

<!-- START CONTENT -->
<div class="content">
    <i id="btn_show" class="fa-solid fa-bars btn_show"></i>
    <h3 class="title-content">Dashboard</h3>

    <div class="stat">
        <div class="stat1">
            <canvas id="chart1" width="100" height="100"></canvas>
        </div>

        <div class="stat2">
            <canvas id="chart2" width="100" height="100"></canvas>
        </div>

        <div class="stat3">
            <canvas id="chart3" width="100" height="100"></canvas>
        </div>

        <div class="stat4">
            <canvas id="chart4" width="100" height="100"></canvas>
        </div>
    </div>

</div>
<!-- END CONTENT -->


<?= $this->endSection() ?>