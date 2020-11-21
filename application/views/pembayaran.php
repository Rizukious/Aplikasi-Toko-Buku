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
    // Merubah data JSON menjadi Array 
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

                <form>
                  <h4>Alamat Pengirim</h4>

                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Provinsi Asal</label>
                            <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlSelect1">
                              <option>Pilih Provinsi</option>
                              <!-- Menampilkan data hasil parsing JSON to Array -->
                              <?php 
                                if ($provinsi['rajaongkir']['status']['code'] == '200') {
                                    foreach ($provinsi['rajaongkir']['results'] as $pv) {
                                        echo "<option name='$pv[province_id]'>$pv[province]</option>";
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
                              <option value="">Pilih Provinsi Dulu</option>
                              <!-- Menampilkan data hasil parsing JSON to Array -->
                              
                            </select>
                          </div>
                      </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>

                  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </form>

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

<!-- Script JS with Ajax Custom -->
<script>
    //Pemanggilan ID dan pembuatan event
    document.getElementById('provinsi').addEventListener('change', function() {
        // akses
        fetch("<?= base_url('dashboard/kota/')?>"+this.value, {
            method:'GET',

        })
        .then((response) => response.text())
        .then((data) => {
            // console.log(data)
            document.getElementById('kota').innerHTML = data
        })
    })
</script>