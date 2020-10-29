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
            <?php foreach ($pesanan as $p) : ?>
                <form action="<?= base_url() . 'admin/data_pesanan/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">ID Pesanan</label>
                        <input type="text" name="id" id="" class="form-control" value="<?= $p->id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ID Invoice</label>
                        <input type="text" name="id_invoice" id="" class="form-control" value="<?= $p->id_invoice ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ID Buku</label>
                        <input type="text" name="id_buku" id="" class="form-control" value="<?= $p->id_buku ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" name="judul_buku" id="" class="form-control" value="<?= $p->judul_buku ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="jumlah" id="" class="form-control" value="<?= $p->jumlah ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" id="" class="form-control" value="<?= $p->harga ?>">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/data_pesanan/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->