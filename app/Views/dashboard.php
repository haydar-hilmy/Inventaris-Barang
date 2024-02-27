<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

include 'php/function.php';

$get_user = $_SESSION['login'];
$query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
$array_user = mysqli_fetch_array($query_user);

$query_barang_minimum = mysqli_query($con, "SELECT *
FROM stock
ORDER BY stock ASC;");

$query_barang_harga = mysqli_query($con, "SELECT *
FROM stock
ORDER BY id ASC
LIMIT 10;");

$query_barang_masuk = mysqli_query($con, "SELECT SUM(total_harga) AS 'total_masuk' FROM barang_masuk JOIN stock ON stock.id = barang_masuk.id_barang");
$total_barang_masuk = mysqli_fetch_array($query_barang_masuk);

$query_barang_keluar = mysqli_query($con, "SELECT SUM(total_harga) AS 'total_keluar' FROM barang_keluar JOIN stock ON stock.id = barang_keluar.id_barang");
$total_barang_keluar = mysqli_fetch_array($query_barang_keluar);


$currentMonth = date('m');
$currentYear = date('Y');
// $query_tren_barang_keluar = mysqli_query($con, "SELECT * FROM barang_keluar WHERE MONTH(tanggal) = $currentMonth AND YEAR(tanggal) = $currentYear ORDER BY tanggal, id ASC");
$query_tren_barang_keluar = mysqli_query($con, "SELECT MAX(id) AS max_id, tanggal, SUM(qty) AS total_jumlah FROM barang_keluar WHERE MONTH(tanggal) = $currentMonth AND YEAR(tanggal) = $currentYear GROUP BY tanggal ORDER BY tanggal ASC");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <link rel="shortcut icon" href="assets/img/goods.png" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>App Persediaan Barang</title>
</head>

<body>

    <!-- START -->
    <div class="all-content">

        <nav id="nav">

            <a href="manage_admin.php">
                <div class="profile-user">
                    <div class="img" style="background-image: url('assets/img/kitty.png');"></div>
                    <h4><?php echo $array_user['username']; ?></h4>
                </div>
            </a>

            <div class="nav-button">
                <a class="active-btn" href="dashboard.php">
                    <img alt="icon" src="assets/icon/layers-minimalistic-svgrepo-com.svg">
                    <h4>Dashboard</h4>
                </a>
                <a href="barang.php">
                    <img alt="icon" src="assets/icon/archive-svgrepo-com.svg">
                    <h4>Stock Barang</h4>
                </a>
                <a href="barang_masuk.php">
                    <img alt="icon" src="assets/icon/archive-down-svgrepo-com.svg">
                    <h4>Barang Masuk</h4>
                </a>
                <a href="barang_keluar.php">
                    <img alt="icon" src="assets/icon/archive-up-svgrepo-com.svg">
                    <h4>Barang Keluar</h4>
                </a>
                <a href="logout.php">
                    <img alt="icon" src="assets/icon/logout-2-svgrepo-com.svg">
                    <h4>Logout</h4>
                </a>
            </div>

        </nav>

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


    </div>
    <!-- END -->

    <script>
        const data_total_harga = {
            labels: [
                'Masuk',
                'Keluar'
            ],
            datasets: [{
                data: [<?php echo $total_barang_masuk["total_masuk"]; ?>, <?php echo $total_barang_keluar["total_keluar"]; ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 2
            }]
        };

        const config_total_harga = {
            type: 'doughnut',
            data: data_total_harga,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Harga Barang Masuk dan Keluar',
                        font: {
                            size: 16,
                        },
                    },
                },
            },
        };




        const data_stock_barang = {
            labels: [<?php foreach($query_barang_minimum as $val){echo "'" . $val["nama_barang"] . "',";}?>],
            datasets: [{
                label: "Stok",
                data: [<?php foreach($query_barang_minimum as $val){echo $val["stock"] . ",";}?>],
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 205, 86)', 'rgb(54, 162, 235)'],
                hoverOffset: 2,
            }],
        };

        const config_stock_barang = {
            type: 'bar',
            data: data_stock_barang,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Analisis Stok Terkini: Mendekati Batas Minimum',
                        font: {
                            size: 16,
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        };


        const data_harga = {
            labels: [<?php foreach($query_barang_harga as $val){echo "'" . $val["nama_barang"] . "',";}?>],
            datasets: [{
                label: 'harga',
                data: [<?php foreach($query_barang_harga as $val){echo "'" . $val["harga"] . "',";}?>],
                backgroundColor: ['#3081D0', 'rgb(255, 205, 86)', '#DF826C', 'rgb(255, 99, 132)', '#67729D', '#EEF296'],
                borderWidth: 1,
            }],
        };

        const config_harga = {
            type: 'bar',
            data: data_harga,
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Rangkuman Harga Barang',
                        font: {
                            size: 16,
                        },
                    },
                },
            },
        };







        const data_keluar = {
            labels: [<?php foreach($query_tren_barang_keluar as $val) {echo "'" . date('d', strtotime($val["tanggal"])) . "',";} ?>],
            datasets: [{
                label: 'Keluar',
                data: [<?php foreach($query_tren_barang_keluar as $val){echo $val["total_jumlah"] . ",";} ?>],
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 2,
                fill: true,
            }],
        };

        const config_keluar = {
            type: 'line',
            data: data_keluar,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Tren Pengeluaran Barang Bulan Ini',
                        font: {
                            size: 16,
                        },
                    },
                },
            },
        };



        const ctx_total_harga = document.getElementById('chart1').getContext('2d');
        const total_harga = new Chart(ctx_total_harga, config_total_harga);

        const ctx_stock_barang = document.getElementById('chart2').getContext('2d');
        const stock_barang = new Chart(ctx_stock_barang, config_stock_barang);

        const ctx_harga = document.getElementById('chart3').getContext('2d');
        const harga = new Chart(ctx_harga, config_harga);

        const ctx_keluar = document.getElementById('chart4').getContext('2d');
        const keluar = new Chart(ctx_keluar, config_keluar);
    </script>
    <script src="js/dashboard.js"></script>
</body>

</html>