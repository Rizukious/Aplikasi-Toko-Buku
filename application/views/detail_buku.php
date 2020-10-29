<div class="container-fluid mb-5">

    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">
            <?php foreach ($buku as $bk) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url() . '/uploads/' . $bk->gambar ?>" alt="" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-hover table-responsive table-striped">
                            <tr>
                                <td>Judul Buku</td>
                                <td><strong><?= $bk->judul_buku ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?= $bk->keterangan ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?= $bk->kategori ?></strong></td>
                            </tr>

                            <tr>
                                <td>Stok</td>
                                <td><strong><?= $bk->stok ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?= number_format($bk->harga, 0, ',', '.') ?></div>
                                    </strong></td>
                            </tr>
                        </table>
                        <?= anchor('welcome/', '<div class="btn btn-danger btn-sm">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>