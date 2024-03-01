<?php
session_start();

include 'function.php';

if(!isset($_SESSION['login'])){
    header("Location: index.php");
}

$get_user = $_SESSION['login'];
$query_user = mysqli_query($con, "SELECT * FROM user WHERE username = '$get_user'");
$array_user = mysqli_fetch_array($query_user);

$get_id_barang = $_GET['id_barang'];
$query_barang = mysqli_query($con, "SELECT * FROM stock WHERE id = '$get_id_barang'");
$array_barang = mysqli_fetch_array($query_barang);

?>
<form method="post" class="box-modal-form">
    <input type="hidden" name="id_barang" value="<?= $array_barang["id"]; ?>">
    <span class="close-icon" id="close-icon-edit">&times;</span>
    <h3>Edit Data Barang</h3>

    <input type="hidden" value="<?php echo $array_user["username"]; ?>" name="admin">

    <div>
        <label for="nama_barang">Nama Barang</label>
        <input value="<?= $array_barang["nama_barang"]; ?>" placeholder="Nama Barang" name="nama_barang" id="nama_barang" type="text" required>
    </div>

    <div>
        <label for="deskripsi">Deskripsi Barang</label>
        <textarea placeholder="Deskripsi Barang" name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $array_barang["deskripsi"]; ?></textarea>
    </div>

    <div>
        <label for="harga_barang">Harga Barang</label>
        <input value="<?= $array_barang["harga"]; ?>" placeholder="Harga Barang" type="number" min="0" step="0.01" name="harga_barang" id="harga_barang" required>
    </div>

    <div>
        <button name="edit" id="test" type="submit">Edit</button>
    </div>
</form>


<script>
    $("#close-icon-edit").on('click', function() {
        $("#box-modal-edit-form").hide(200);
    });
</script>