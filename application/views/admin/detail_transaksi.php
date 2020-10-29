<div class="container-fluid mb-5">

    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">

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
            <div align="right">
                <a href="<?= base_url('admin/invoice') ?>">
                    <div class="btn btn-sm btn-danger">Kembali</div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>