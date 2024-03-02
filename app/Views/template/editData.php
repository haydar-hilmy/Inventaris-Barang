    <?= csrf_field(); ?>
    <span class="close-icon" id="close-icon-edit">&times;</span>
    <h3>Edit Data Barang</h3>

    <input type="hidden" name="id" id="id_barang" value="<?= $barang["id"] ?>">

    <div>
        <label for="nama_barang">Nama Barang</label>
        <input value="<?= $barang["nama_barang"] ?>" placeholder="Nama Barang" name="nama_barang" id="nama_barang" type="text" required>
    </div>

    <div>
        <label for="deskripsi">Deskripsi Barang</label>
        <textarea placeholder="Deskripsi Barang" name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $barang["deskripsi"] ?></textarea>
    </div>

    <div>
        <label for="harga_barang">Harga Barang</label>
        <input value="<?= $barang["harga"] ?>" placeholder="Harga Barang" type="number" min="0" step="0.01" name="harga_barang" id="harga_barang" required>
    </div>

    <div>
        <button id="btn_edit" type="submit">Edit</button>
    </div>


    <script>
        $("#close-icon-edit").on('click', function() {
            $("#box-modal-edit-form").hide(200);
        });
    </script>