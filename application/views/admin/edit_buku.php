<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><i class="fas fa-edit"></i> <?= $judul; ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_card; ?></h6>
        </div>
        <div class="card-body">
            <?php foreach ($buku as $bk) : ?>
                <form action="<?= base_url() . 'admin/data_buku/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" name="judul_buku" id="" class="form-control" value="<?= $bk->judul_buku ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" id="" class="form-control" value="<?= $bk->keterangan ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option><?= $bk->kategori ?></option>
                            <option>Pemrograman</option>
                            <option>Novel</option>
                            <option>Biografi</option>
                            <option>Komik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="hidden" name="id_buku" id="" class="form-control" value="<?= $bk->id_buku ?>">
                        <input type="text" name="harga" id="" class="form-control" value="<?= $bk->harga ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" id="" class="form-control" value="<?= $bk->stok ?>">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/data_buku/index/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->