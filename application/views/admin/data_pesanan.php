<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><i class="fas fa-file-invoice-dollar"></i> <?= $judul; ?></h1>
    </div>
    <?= $this->session->flashdata('pesan') ?>

    <!-- DataTales Example -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title_card; ?></h6>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_buku"><i class="fas fa-plus fa-sm"></i> Tambah Buku</button> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Pesanan</th>
                            <th>ID Invoice</th>
                            <th>Judul Buku</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>ID Pesanan</th>
                            <th>ID Invoice</th>
                            <th>Judul Buku</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesan as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->id ?></td>
                                <td><?= $p->id_invoice ?></td>
                                <td><?= $p->judul_buku ?></td>
                                <td><?= $p->jumlah ?></td>
                                <td><?= $p->harga ?></td>
                                <td class="text-center">
                                    <!-- <?= anchor('admin/data_buku/detail/' . $p->id, '<div class="btn btn-success btn-sm btn-circle"><i class="fas fa-search-plus"></i></div>') ?> -->
                                    <?= anchor('admin/data_pesanan/edit/' . $p->id, '<div class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></div>') ?>
                                    <?= anchor('admin/data_pesanan/hapus/' . $p->id_invoice, '<div class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash-alt"></i></div>') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="tambah_buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM INPUT BUKU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'admin/data_buku/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="kategori" class="form-control">
                                <option>Pemrograman</option>
                                <option>Novel</option>
                                <option>Biografi</option>
                                <option>Komik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" name="stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Buku</label><br>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div> -->
</div>
</div>
<!-- End of Main Content -->