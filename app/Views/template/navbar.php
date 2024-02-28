<nav id="nav">

    <a href="manage_admin.php">
        <div class="profile-user">
            <div class="img" style="background-image: url('assets/img/kitty.png');"></div>
            <h4>username</h4>
        </div>
    </a>

    <div class="nav-button">
        <a class="<?= $title == "Dashboard"? 'active-btn' : "" ?>" href="/dashboard">
            <img alt="icon" src="assets/icon/layers-minimalistic-svgrepo-com.svg">
            <h4>Dashboard</h4>
        </a>
        <a class="<?= $title == "Barang"? 'active-btn' : "" ?>" href="/barang">
            <img alt="icon" src="assets/icon/archive-svgrepo-com.svg">
            <h4>Stock Barang</h4>
        </a>
        <a class="<?= $title == "Barang Masuk"? 'active-btn' : "" ?>" href="/barang_masuk">
            <img alt="icon" src="assets/icon/archive-down-svgrepo-com.svg">
            <h4>Barang Masuk</h4>
        </a>
        <a class="<?= $title == "Barang Keluar"? 'active-btn' : "" ?>" href="/barang_keluar">
            <img alt="icon" src="assets/icon/archive-up-svgrepo-com.svg">
            <h4>Barang Keluar</h4>
        </a>
        <a href="/logout">
            <img alt="icon" src="assets/icon/logout-2-svgrepo-com.svg">
            <h4>Logout</h4>
        </a>
    </div>

</nav>