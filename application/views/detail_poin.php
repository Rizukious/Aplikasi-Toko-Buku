<div class="container-fluid mb-5">

    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Buku di Pesan</th>
                    <th>Point</th>
                </tr>
                <?php
                $no = 1;
                foreach ($transaksi as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t->nama ?></td>
                        <td><?= $t->total_buku_dipesan ?></td>
                        <td><?= $t->total_poin ?></td>
                    </tr>

                    <tr>
                        <td colspan="3">Point yang di Dapat Setiap beli 1 buku ialah 5 Point</td>
                        <td><?= number_format($t->total_poin, 0, ',', '.') ?> Points</td>
                    </tr>
            </table>

            <?= anchor('reward/redeem_poinmu/' . $t->total_poin, '<div class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Lihat apa yang bisa anda tukar dengan Point Anda </span>
            </div>') ?>
        <?php endforeach; ?>
        <h5 class="mt-3">Detail Transaksi Anda</h5>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Pesan</th>
                <th>Buku di Pesan</th>
                <th>Point</th>
            </tr>
            <?php
            $no = 1;
            foreach ($det_trans as $t) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t->id ?></td>
                    <td><?= $t->nama ?></td>
                    <td><?= $t->tgl_pesan ?></td>
                    <td><?= $t->judul_buku ?></td>
                    <td><?= $t->points ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>
</div>