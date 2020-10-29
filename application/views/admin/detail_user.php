<div class="container-fluid mb-5">

    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">
            <?php foreach ($user as $u) : ?>
                <table class="table table-bordered table-hover table-responsive table-striped">
                    <tr>
                        <td>ID User</td>
                        <td><strong><?= $u->id ?></strong></td>
                    </tr>

                    <tr>
                        <td>Nama</td>
                        <td><strong><?= $u->nama ?></strong></td>
                    </tr>

                    <tr>
                        <td>Username</td>
                        <td><strong><?= $u->username ?></strong></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><strong><?= $u->password ?></strong></td>
                    </tr>

                    <tr>
                        <td>Role ID</td>
                        <td><strong><?= $u->role_id ?></strong></td>
                    </tr>
                </table>
                <?= anchor('admin/data_user/index/', '<div class="btn btn-danger btn-sm">Kembali</div>') ?>

            <?php endforeach; ?>
        </div>
    </div>
</div>