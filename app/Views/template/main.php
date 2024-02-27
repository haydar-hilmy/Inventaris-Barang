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
    <title><?= $title ?></title>
</head>

<body>

    <!-- START -->
    <div class="all-content">

        <?= $this->include('template/navbar') ?>

        <?= $this->renderSection('content') ?>

    </div>
    <!-- END -->

    <script>
        const data_total_harga = {
            labels: [
                'Masuk',
                'Keluar'
            ],
            datasets: [{
                data: [10, 10],
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
            labels: ['lorem', 'lorem'],
            datasets: [{
                label: "Stok",
                data: [10, 10],
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
            labels: ['lorem2', 'lorem2'],
            datasets: [{
                label: 'harga',
                data: ['10.000', '10.000'],
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
            labels: [],
            datasets: [{
                label: 'Keluar',
                data: [10, 10],
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