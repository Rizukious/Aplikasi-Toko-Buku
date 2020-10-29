<div class="container-fluid mb-5">
    <?= $this->session->flashdata('pesan') ?>
    <div class="card">
        <div class="card-header">
            <?= $title_card; ?>
        </div>
        <div class="card-body mb-2">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub-Total</th>
                </tr>
                <?php
                $no = 1;
                foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $items['name'] ?></td>
                        <td><?= $items['qty'] ?></td>
                        <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                        <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"></td>
                    <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                </tr>
            </table>
            <div align="right">
                <button class="btn btn-sm btn-danger  tombol-hapus" data-toggle="modal" data-target="#DeleteDataModal">Hapus Keranjang</button>
                <!-- <a href="<?= base_url('dashboard/hapus_keranjang') ?>">
                    <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                </a> -->
                <a href="<?= base_url('welcome') ?>">
                    <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
                </a>
                <a href="<?= base_url('dashboard/pembayaran') ?>">
                    <div class="btn btn-sm btn-success">Pembayaran</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="DeleteDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <h4 class="text-center">Apakah anda yakin untuk menghapus list keranjang?</h4>

            </div>
            <?= form_open_multipart('dashboard/hapus_keranjang'); ?>
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="hidden" class="form-control" id="id" name="id_legalisir" value="">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Ok</button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
</div>