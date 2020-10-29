<div class="container-fluid mb-5">

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
                <a href="<?= base_url('dashboard/hapus_keranjang') ?>">
                    <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                </a>
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
</div>