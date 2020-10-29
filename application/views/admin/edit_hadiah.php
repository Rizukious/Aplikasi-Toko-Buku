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
            <?php foreach ($hadiah as $h) : ?>
                <form action="<?= base_url() . 'admin/data_hadiah/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">ID Gift</label>
                        <input type="text" name="id_hadiah" id="" class="form-control" value="<?= $h->id_hadiah ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Gift</label>
                        <input type="text" name="nama_hadiah" id="" class="form-control" value="<?= $h->nama_hadiah ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ringkasan</label>
                        <input type="text" name="ringkasan" id="" class="form-control" value="<?= $h->ringkasan ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" id="" class="form-control" value="<?= $h->deskripsi ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Poin</label>
                        <input type="text" name="points" id="" class="form-control" value="<?= $h->points ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" id="" class="form-control" value="<?= $h->stok ?>">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/data_hadiah/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->