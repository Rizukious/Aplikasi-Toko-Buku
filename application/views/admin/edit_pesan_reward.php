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
            <?php foreach ($pesan as $p) : ?>
                <form action="<?= base_url() . 'admin/data_pesan_reward/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">ID Pesanan Reward</label>
                        <input type="text" name="id" id="" class="form-control" value="<?= $p->id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ID Hadiah</label>
                        <input type="text" name="id_hadiah" id="" class="form-control" value="<?= $p->id_hadiah ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemesan</label>
                        <input type="text" name="nama" id="" class="form-control" value="<?= $p->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Pemesan</label>
                        <input type="text" name="alamat" id="" class="form-control" value="<?= $p->alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Pesan</label>
                        <input type="text" name="jumlah" id="" class="form-control" value="<?= $p->jumlah ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pesan</label>
                        <input type="text" name="tgl_pesan" id="" class="form-control" value="<?= $p->tgl_pesan ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/data_pesan_reward/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->