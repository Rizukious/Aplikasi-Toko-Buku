<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><i class="fas fa-gifts"></i> <?= $judul; ?></h1>
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
                    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_hadiah"><i class="fas fa-plus fa-sm"></i> Tambah Hadiah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Gift</th>
                            <th>Nama Gift</th>
                            <th>Point</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>ID Gift</th>
                            <th>Nama Gift</th>
                            <th>Point</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hadiah as $h) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $h->id_hadiah ?></td>
                                <td><?= $h->nama_hadiah ?></td>
                                <td><?= $h->points ?></td>
                                <td><?= $h->stok ?></td>
                                <td class="text-center">
                                    <?= anchor('admin/data_hadiah/detail/' . $h->id_hadiah, '<div class="btn btn-success btn-sm btn-circle"><i class="fas fa-search-plus"></i></div>') ?>
                                    <?= anchor('admin/data_hadiah/edit/' . $h->id_hadiah, '<div class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></div>') ?>
                                    <?= anchor('admin/data_hadiah/hapus/' . $h->id_hadiah, '<div class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash-alt"></i></div>') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_hadiah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM INPUT Hadiah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'admin/data_hadiah/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama Gift</label>
                            <input type="text" name="nama_hadiah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Ringkasan</label>
                            <input type="text" name="ringkasan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Points</label>
                            <input type="text" name="points" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" name="stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Gift</label><br>
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
    </div>
</div>
</div>
<!-- End of Main Content -->