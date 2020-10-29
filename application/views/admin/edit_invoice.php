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
            <?php foreach ($invoice as $i) : ?>
                <form action="<?= base_url() . 'admin/invoice/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">ID Invoice</label>
                        <input type="text" name="id" id="" class="form-control" value="<?= $i->id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemesan</label>
                        <input type="text" name="nama" id="" class="form-control" value="<?= $i->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="" class="form-control" value="<?= $i->alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pesan</label>
                        <input type="text" name="tgl_pesan" id="" class="form-control" value="<?= $i->tgl_pesan ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Batas Bayar</label>
                        <input type="text" name="batas_bayar" id="" class="form-control" value="<?= $i->batas_bayar ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Points</label>
                        <input type="text" name="points" id="" class="form-control" value="<?= $i->points ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/invoice/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->