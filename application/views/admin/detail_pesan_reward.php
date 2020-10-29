<div class="container-fluid mb-5">

    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">

            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>No</th>
                    <th>ID Pesan Reward</th>
                    <th>ID Reward</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesan</th>
                </tr>
                <?php
                $no = 1;
                foreach ($pesan as $p) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->id ?></td>
                        <td><?= $p->id_hadiah ?></td>
                        <td><?= $p->nama ?></td>
                        <td><?= $p->alamat ?></td>
                        <td><?= $p->jumlah ?></td>
                        <td><?= $p->tgl_pesan ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div align="right">
                <a href="<?= base_url('admin/data_pesan_reward') ?>">
                    <div class="btn btn-sm btn-danger">Kembali</div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>