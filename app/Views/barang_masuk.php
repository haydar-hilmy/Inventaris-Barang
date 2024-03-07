<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

<!-- START CONTENT -->
<div class="content">
    <i id="btn_show" class="fa-solid fa-bars btn_show"></i>
    <h3 class="title-content">Barang Masuk</h3>

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
                    <th>Pemasok</th>
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
                <?php $i = 1;
                foreach ($barangMasuk as $key => $b) : ?>
                    <tr>
                        <td class="center-td"><?= $i++ ?></td>
                        <td class="id_transaksi"><?= $b["id"] ?></td>
                        <td class="id_barang"><?= $b["id_barang"] ?></td>
                        <td><?= $b["nama_barang"] ?></td>
                        <td>24</td>
                        <td>292929</td>
                        <td>899999</td>
                        <td>pt pasok</td>
                        <td>admin</td>
                        <td>9 april 2004</td>
                        <!-- <td class="center-td"><img class="act-btn delete-btn" src="assets/icon/delete-2-svgrepo-com.svg"></td> -->
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
    <form method="post" class="box-modal-form">
        <span class="close-icon" id="close-icon-add">&times;</span>
        <h3>Barang Masuk</h3>

        <input type="hidden" name="admin" value="username">

        <div>
            <label for="nama">Nama Barang</label>
            <select name="id_barang" id="select_barang" required>
                <option value="" disabled selected>Select Barang</option>
                <?php foreach($barang as $key => $b): ?>
                <option value="<?= $b->id ?>"><?= $b->nama_barang ?></option>
                <?php endforeach ?> 
            </select>
        </div>

        <div>
            <label for="tanggal">Tanggal Masuk</label>
            <input placeholder="Tanggal Masuk" type="date" name="tanggal" id="tanggal" required>
        </div>

        <div id="max_jumlah_barang">
            <label for="jumlah">Jumlah</label>
            <input placeholder="Jumlah Barang" class="not_allow" min="1" disabled type="number" name="jumlah" id="jumlah" required>
        </div>

        <div>
            <label for="pemasok">Pemasok</label>
            <input placeholder="Pemasok" autocomplete="on" type="text" name="pemasok" id="pemasok" required>
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


<script src="js/barang_masuk.js"></script>

<?= $this->endSection() ?>