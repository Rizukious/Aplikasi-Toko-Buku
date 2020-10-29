<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><i class="fas fa-users-cog"></i> <?= $judul; ?></h1>
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
                    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_user"><i class="fas fa-user-plus fa-sm"></i> Tambah User</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u->id ?></td>
                                <td><?= $u->nama ?></td>
                                <td><?= $u->username ?></td>
                                <td class="text-center">
                                    <?= anchor('admin/data_user/detail/' . $u->id, '<div class="btn btn-success btn-circle btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                    <?= anchor('admin/data_user/edit/' . $u->id, '<div class="btn btn-sm btn-circle btn-warning"><i class="fas fa-user-edit"></i></div>') ?>
                                    <?= anchor('admin/data_user/hapus/' . $u->id, '<div class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash-alt"></i></div>') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM INPUT USER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'admin/data_user/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role ID</label><br>
                            <small><b>Note * :</b>Role id <b>1</b> untuk Admin, dan Role id <b>2</b> untuk User</small>
                            <select name="role_id" class="form-control">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> <!-- End of Main Content -->