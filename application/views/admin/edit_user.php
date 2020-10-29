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
            <?php foreach ($user as $u) : ?>
                <form action="<?= base_url() . 'admin/data_user/update' ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control" value="<?= $u->nama ?>">
                        <input type="hidden" name="id" id="" class="form-control" value="<?= $u->id ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" value="<?= $u->username ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" value="<?= $u->password ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Role ID</label>
                        <select name="role_id" class="form-control">
                            <option><?= $u->role_id ?></option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                    <?= anchor('admin/data_user/index/', '<div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->