<?php if (!$barang) { ?>
    <tr>
        <td class="center-td" colspan="10">Tidak Ada Data</td>
    </tr>
<?php } else ?>
<?php $i = 1;
foreach ($barang as $key => $b) : ?>
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
        <td><img class="act-btn edit-btn" data-id="<?= $b->id ?>" src="assets/icon/edit-3-svgrepo-com.svg"> | <img data-id="<?= $b->id ?>" data-nama="<?= $b->nama_barang ?>" class="act-btn delete-data" src="assets/icon/delete-2-svgrepo-com.svg"></td>
    </tr>
<?php endforeach ?>