<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

include 'php/function.php';

$get_user = $_SESSION['login'];
$query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
$array_user = mysqli_fetch_array($query_user);

$query_all_user = mysqli_query($con, "SELECT * FROM user");

if (isset($_POST['tambah'])) {
    if (TambahAdmin($_POST) > 0) {
        echo "<script>alert('Berhasil menambah admin!');window.location = 'manage_admin.php';</script>";
    } else {
        echo "<script>alert('Oops! gagal menambah admin :(');window.location = 'manage_admin.php';</script>";
    }
}

if (isset($_POST['edit'])) {
    if (EditAdmin($_POST) > 0) {
        echo "<script>alert('Berhasil mengedit admin!');window.location = 'manage_admin.php';</script>";
    } else {
        echo "<script>alert('Oops! gagal mengedit admin :(');window.location = 'manage_admin.php';</script>";
    }
}

if (isset($_GET['cari'])) {
    $pencarian = $_GET['cari'];
    $query_all_user = mysqli_query($con, "SELECT * FROM user WHERE username LIKE '%$pencarian%' ORDER BY id ASC");
}

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
                <a href="dashboard.php">
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
            <h3 class="title-content">Manage Admin</h3>

            <!-- START OPTION_TABLE -->
            <div class="table-pack">

                <div class="option-table">
                    <div class="left">
                        <button id="btn-add"><i class="fa-solid fa-plus"></i> Add</button>
                    </div>

                    <div class="right">
                        <form method="get">
                            <input type="text" placeholder="search admin" name="cari">
                            <button type="submit"><img src="assets/icon/search-alt-2-svgrepo-com.svg" alt="icon-search"></button>
                        </form>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Admin</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        if (mysqli_num_rows($query_all_user) == 0 && isset($_GET["cari"])) { ?>
                            <tr>
                                <td class="center-td" colspan="8">Data Tidak Ditemukan</td>
                            </tr>
                        <?php } else if (mysqli_num_rows($query_all_user) == 0) { ?>
                            <tr>
                                <td class="center-td" colspan="8">Belum Ada Data</td>
                            </tr>
                        <?php }
                        foreach ($query_all_user as $key) { ?>
                            <tr>
                                <td class="center-td"><?php echo $i++; ?></td>
                                <td class="center-td id_admin"><?php echo $key["id"]; ?></td>
                                <td><?php echo $key["username"]; ?></td>
                                <td><?php echo str_repeat('*', strlen($key["password"])); ?></td>
                                <td><?php echo $key["email"]; ?></td>
                                <td class="center-td"><img class="act-btn edit-btn" src="assets/icon/edit-3-svgrepo-com.svg"> | <img class="act-btn delete-btn" src="assets/icon/delete-2-svgrepo-com.svg"></td>
                            </tr>
                        <?php } ?>
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
                <h3>Tambah Admin</h3>

                <div>
                    <label for="username">Nama Admin</label>
                    <input autofocus placeholder="Username" name="username" id="username" type="text" required>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input placeholder="Password" name="password" id="password" type="password" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input placeholder="Email" type="email" name="email" id="email" required>
                </div>

                <div>
                    <button name="tambah" type="submit">Tambah</button>
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
                    <h3>Anda yakin ingin menghapus?</h3>
                </div>
                <div class="btn-modal"><button id="yes-btn" class="box-green">Ya</button> <button id="cancel-btn" class="box-warn">Tidak</button></div>
            </div>
        </div>


    </div>
    <!-- END -->


    <script src="js/manage_admin.js"></script>
</body>

</html>