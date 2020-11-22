<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 22dbaea8e73f18a13ad2e657a41a612d"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // Merubah Data JSON menjadi Array
    $provinsi = json_decode($response, true);
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success text-white">
            <h6 class="m-0 font-weight-bold text-primary"> <?php
                                                            $grand_total = 0;
                                                            if ($keranjang = $this->cart->contents()) {
                                                                foreach ($keranjang as $item) {
                                                                    $grand_total = $grand_total + $item['subtotal'];
                                                                }
                                                                echo "<h4>Total Belanjaan Anda: Rp. " . number_format($grand_total, 0, ',', '.');

                                                            ?></h6>
        </div>
        <?= $this->session->flashdata('pesan') ?>
        <div class="row justify-content-center">
            <div class="col-md-8 m-5">
                <!-- Codingan Testing Api -->
                <h3>Input Alamat Pengiriman dan Pembayaran</h3>

                <form method="POST">
                    <h4>Alamat Pengirim</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provinsi Asal</label>
                                <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Pilih Provinsi</option>
                                    <!-- Menampilkan data hasil parsing JSON to Array -->
                                    <?php
                                                                if ($provinsi['rajaongkir']['status']['code'] == '200') {
                                                                    foreach ($provinsi['rajaongkir']['results'] as $pv) {
                                                                        echo "<option value='$pv[province_id]' " . ($pv['province_id'] == $this->input->post('provinsi') ? "selected" : "") . ">$pv[province]</option>";
                                                                    }
                                                                }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kota Asal</label>
                                <select id="kota" name="kota" class="form-control" id="exampleFormControlSelect1">

                                    <!-- Menampilkan data hasil parsing JSON to Array -->
                                    <?php
                                                                if (count($_POST)) {
                                                                    $curl = curl_init();

                                                                    curl_setopt_array($curl, array(
                                                                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $this->input->post('provinsi'),
                                                                        CURLOPT_RETURNTRANSFER => true,
                                                                        CURLOPT_ENCODING => "",
                                                                        CURLOPT_MAXREDIRS => 10,
                                                                        CURLOPT_TIMEOUT => 30,
                                                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                        CURLOPT_CUSTOMREQUEST => "GET",
                                                                        CURLOPT_HTTPHEADER => array(
                                                                            "key: 22dbaea8e73f18a13ad2e657a41a612d"
                                                                        ),
                                                                    ));

                                                                    $response = curl_exec($curl);
                                                                    $err = curl_error($curl);

                                                                    curl_close($curl);

                                                                    if ($err) {
                                                                        echo "cURL Error #:" . $err;
                                                                    } else {
                                                                        // Merubah Data JSON menjadi Array
                                                                        $kota = json_decode($response, true);

                                                                        //Pengecekan terhubungkan ke API
                                                                        if ($kota['rajaongkir']['status']['code'] == '200') {
                                                                            echo "<option value=''>Pilih Kota</option>";
                                                                            foreach ($kota['rajaongkir']['results'] as $kt) {
                                                                                echo "<option value='$kt[city_id]' " . ($kt['city_id'] == $this->input->post('kota') ? "selected" : "") . ">$kt[city_name]</option>";
                                                                            }
                                                                        }
                                                                    }
                                                                } else {
                                                                    echo "<option>Pilih Provinsi Dulu</option>";
                                                                }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h4>Alamat Penerima</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provinsi Penerima</label>
                                <select id="provinsi_penerima" name="provinsi_penerima" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Pilih Provinsi Penerima</option>
                                    <!-- Menampilkan data hasil parsing JSON to Array -->
                                    <?php
                                                                if ($provinsi['rajaongkir']['status']['code'] == '200') {
                                                                    foreach ($provinsi['rajaongkir']['results'] as $pv) {
                                                                        echo "<option value='$pv[province_id]' " . ($pv['province_id'] == $this->input->post('provinsi_penerima') ? "selected" : "") . ">$pv[province]</option>";
                                                                    }
                                                                }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kota Penerima</label>
                                <select id="kota_penerima" name="kota_penerima" class="form-control" id="exampleFormControlSelect1">
                                    <?php
                                                                if (count($_POST)) {
                                                                    $curl = curl_init();

                                                                    curl_setopt_array($curl, array(
                                                                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $this->input->post('provinsi_penerima'),
                                                                        CURLOPT_RETURNTRANSFER => true,
                                                                        CURLOPT_ENCODING => "",
                                                                        CURLOPT_MAXREDIRS => 10,
                                                                        CURLOPT_TIMEOUT => 30,
                                                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                        CURLOPT_CUSTOMREQUEST => "GET",
                                                                        CURLOPT_HTTPHEADER => array(
                                                                            "key: 22dbaea8e73f18a13ad2e657a41a612d"
                                                                        ),
                                                                    ));

                                                                    $response = curl_exec($curl);
                                                                    $err = curl_error($curl);

                                                                    curl_close($curl);

                                                                    if ($err) {
                                                                        echo "cURL Error #:" . $err;
                                                                    } else {
                                                                        // Merubah Data JSON menjadi Array
                                                                        $kota = json_decode($response, true);

                                                                        //Pengecekan terhubungkan ke API
                                                                        if ($kota['rajaongkir']['status']['code'] == '200') {
                                                                            echo "<option value=''>Pilih Kota</option>";
                                                                            foreach ($kota['rajaongkir']['results'] as $kt) {
                                                                                echo "<option value='$kt[city_id]' " . ($kt['city_id'] == $this->input->post('kota_penerima') ? "selected" : "") . ">$kt[city_name]</option>";
                                                                            }
                                                                        }
                                                                    }
                                                                } else {
                                                                    echo "<option>Pilih Provinsi Dulu</option>";
                                                                }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ekspedisi</label>
                                <select id="ekspedisi" name="ekspedisi" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Pilih Ekspedisi</option>
                                    <!-- Menampilkan data hasil parsing JSON to Array -->
                                    <?php
                                                                $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' => 'TIKI'];
                                                                foreach ($eks as $key => $value) {
                                                                    echo "<option value='$key' " . ($key == $this->input->post('ekspedisi') ? "selected" : "") . ">$value</option>";
                                                                }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Berat (gram)</label>
                                <input type="text" name="berat" value="<?= $this->input->post('berat') ?>" class="form-control" id="berat" placeholder="gram">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Proses</button>
                </form>

                <div class="card-deck">
                    <?php
                                                                $biaya = json_decode($ongkir, true);
                                                                if ($biaya['rajaongkir']['status']['code'] == '200') {
                                                                    foreach ($biaya['rajaongkir']['results'][0]['costs'] as $by) {
                    ?>
                            <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?= $by['service']; ?></h5>
                                    <p class="card-text"><?= $by['description']; ?></p>
                                    <p class="card-text">Rp. <?= number_format($by['cost']['0']['value'], 0, ',', '.') ?></p>
                                    <p class="card-text"><small class="text-muted">Estimasi Pengiriman <?= $by['cost']['0']['etd']; ?> Hari</small></p>
                                </div>
                            </div>
                    <?php

                                                                    }
                                                                }
                    ?>
                </div>
                <!--============= Codingan Lama =============-->
                <!-- <form action="<?= base_url('dashboard/proses_pesanan') ?>" method="post">
                    <div class="form-group">
                        <label for="">ID User</label>
                        <input type="text" name="id_user" value="<?= $this->session->userdata('id') ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" placeholder="Nama Lengkap Anda" class="form-control">
                        <?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" value="<?= set_value('alamat') ?>" class="form-control">
                        <?= form_error('alamat', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="no_telp" placeholder="No. Telepon Anda" value="<?= set_value('no_telp') ?>" class=" form-control">
                        <?= form_error('no_telp', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jasa Pengiriman</label>
                        <select name="jasa_kirim" id="" class="form-control">
                            <option>-- Pilih Jasa Kirim --</option>
                            <option>JNE</option>
                            <option>TIKI</option>
                            <option>Pos Indonesia</option>
                            <option>Gojek</option>
                            <option>Grab</option>
                        </select>
                        <?= form_error('jasa_kirim', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih BANK</label>
                        <select name="bank" id="" class="form-control" value="<?= set_value('bank') ?>">
                            <option>-- Pilih Bank --</option>
                            <option>BCA - XXXXXXX</option>
                            <option>BNI - XXXXXXX</option>
                            <option>BRI - XXXXXXX</option>
                            <option>Mandiri - XXXXXXX</option>
                        </select>
                        <?= form_error('bank', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <button class="btn btn-sm btn-primary mb-3" type="submit">Pesan</button>
                </form> -->
            <?php
                                                            } else {
                                                                echo "<h4>Keranjang Belanja Anda Masih Kosong!!</h4>
                    ";
                                                            }
            ?>
            </div>
        </div>
    </div>
</div>