<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanjaan Anda: Rp. " . number_format($grand_total, 0, ',', '.');

                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form action="<?= base_url('dashboard/proses_pesanan') ?>" method="post">
                <div class="form-group">
                    <label for="">ID User</label>
                    <input type="text" name="id_user" value="<?= $this->session->userdata('id') ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Telepon</label>
                    <input type="text" name="no_telp" placeholder="No. Telepon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jasa Pengiriman</label>
                    <select name="" id="" class="form-control">
                        <option value="">JNE</option>
                        <option value="">TIKI</option>
                        <option value="">Pos Indonesia</option>
                        <option value="">Gojek</option>
                        <option value="">Grab</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih BANK</label>
                    <select name="" id="" class="form-control">
                        <option value="">BCA - XXXXXXX</option>
                        <option value="">BNI - XXXXXXX</option>
                        <option value="">BRI - XXXXXXX</option>
                        <option value="">Mandiri - XXXXXXX</option>
                    </select>
                </div>
                <button class="btn btn-sm btn-primary mb-3" type="submit">Pesan</button>
            </form>
        <?php
                } else {
                    echo "<h4>Keranjang Belanja Anda Masih Kosong!!";
                }
        ?>
        </div>
    </div>
</div>
</div>
</div>