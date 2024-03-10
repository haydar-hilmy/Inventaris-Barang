<?php if (!$barangMasuk) { ?>
                    <tr>
                        <td class="center-td" colspan="10">Belum Ada Data</td>
                    </tr>
                <?php } else $i = 1;
                foreach ($barangMasuk as $key => $b) : ?>
                    <tr>
                        <td class="center-td"><?= $i++ ?></td>
                        <td class="id_transaksi"><?= $b->id_transaksi ?></td>
                        <td class="id_barang"><?= $b->id_barang ?></td>
                        <td><?= $b->nama_barang ?></td>
                        <td><?= $b->qty ?></td>
                        <td><?= "Rp." . number_format($b->harga, '0', ',', '.') ?></td>
                        <td><?= "Rp." . number_format($b->harga*$b->qty, '0', ',', '.') ?></td>
                        <td><?= $b->pemasok ?></td>
                        <td><?= $b->modified ?></td>
                        <td><?= $b->created_at ?></td>
                        <!-- <td class="center-td"><img class="act-btn delete-btn" src="assets/icon/delete-2-svgrepo-com.svg"></td> -->
                    </tr>
                <?php endforeach ?>