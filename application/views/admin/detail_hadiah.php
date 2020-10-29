<div class="container-fluid mb-5">

    <div class="card">
        <?php foreach ($hadiah as $h) : ?>
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <?= $title_card; ?> : <?= $h->nama_hadiah ?>
                    </div>
                    <div class="col-sm-4 text-right">
                        <p>Redeem Point : <span class="text-primary font-weight-bold"><i class="fas fa-coins"></i> <?= $h->points; ?> Pts</span></p>
                    </div>
                </div>
            </div>
            <div class="card-body mb-2">

                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url() . '/uploads/hadiah/' . $h->gambar ?>" alt="" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Persyaratan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pemesanan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="mt-4">Ringkasan</h3>
                                <div class="fr-view mb-5">
                                    <?= $h->ringkasan; ?>
                                </div>
                                <h3>Deskripsi</h3>
                                <div class="fr-view mb-5 text-justify">
                                    <p><?= $h->deskripsi; ?></p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3 class="mt-4">Persyaratan</h3>
                                <p>Anda membutuhkan <?= $h->points; ?> Points untuk memesan Reward ini.</p>

                                <h3>Syarat Pemesanan</h3>
                                <p>Anda hanya dapat memesan Reward ini bila Anda telah:</p>
                                <ol>
                                    <li>Memverifikasi email Anda</li>
                                    <li>Memasang gambar profile dengan benar</li>
                                    <li>Mengisi nomor telpon yang Anda gunakan</li>
                                    <li>Mengisi data kota yang menandakan tempat tinggal Anda (bukan kota Online)</li>
                                </ol>

                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <h3 class="mt-4">Pemesanan</h3>
                                <br />
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Alamat Tujuan</label>
                                    <p>Mohon untuk memilih alamat tujuan dimana Reward akan dikirim.</p>
                                    <p>Bila Anda belum memasukkan alamat tujuan, Anda <a href="#new-destination-form" data-toggle="collapse">dapat membuatnya sekarang.</a></p>
                                    <p>
                                        <a class="btn btn-md btn-secondary shadow btn-icon-text" href="#new-destination-form" data-toggle="collapse">
                                            <span class="btn-icon-prepend"><i class="fas fa-plus"></i></span>
                                            Tambah Alamat Tujuan Baru
                                            <span class="btn-icon-append"><i class="fas"></i></span>
                                        </a>
                                    </p>

                                    <div class="collapse card card-body bg-light" id="new-destination-form">
                                        <form method="POST" action="https://www.dicoding.com/orders/rewards/738/destinations" accept-charset="UTF-8" role="form"><input name="_token" type="hidden" value="oY9do4nNaVLzouIXZfDtE6c2bUUImAVRYCP4HNFg">
                                            <div class="form-group">
                                                <label class="control-label">Nama Lengkap Penerima</label>
                                                <input type="text" name="full_name" class="form-control" value="Rizukious">
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <label class="contol-label">Alamat Penerima</label>
                                                    <input type="text" name="address" class="form-control" value="">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="contol-label">RT/RW</label>
                                                    <input type="text" name="rtrw" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="contol-label">Kelurahan / Desa</label>
                                                    <input type="text" name="administrative_village" class="form-control" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="contol-label">Kecamatan</label>
                                                    <input type="text" name="district" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="contol-label">Kota/Kab</label>
                                                    <input type="text" name="city" class="form-control" value="">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="contol-label">Kode Pos</label>
                                                    <input type="text" name="postal_code" class="form-control" value="">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="contol-label">No. Telpon</label>
                                                    <input type="text" name="phone" class="form-control" value="+6285211345481">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="alert alert-warning d-flex align-items-center">
                                                    <div class="d-inline-flex pr-3">
                                                        <i class="fas fa-exclamation fa-2x"></i>
                                                    </div>
                                                    <div class="d-inline-flex">Mohon untuk memastikan isian di atas sudah benar. Kesalahan pengisian dapat mengganggu proses pengiriman Reward Anda.</div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-primary shadow btn-icon-text">
                                                <span class="btn-icon-prepend">
                                                    <i class="fas fa-save"></i>
                                                </span>
                                                Simpan Alamat Tujuan Baru
                                            </button>

                                            <a class="btn btn-md btn-secondary shadow" href="#new-destination-form" data-toggle="collapse">
                                                Batal
                                            </a>
                                        </form>
                                    </div>
                                </div>

                                <form method="POST" action="https://www.dicoding.com/orders/rewards" accept-charset="UTF-8" role="form"><input name="_token" type="hidden" value="oY9do4nNaVLzouIXZfDtE6c2bUUImAVRYCP4HNFg">
                                    <input name="reward_id" type="hidden" value="738">
                                    <div class="form-group">
                                        <label class="control-label" for="amount">Jumlah Pemesanan</label>
                                        <input name="amount" id="amount" class="form-control" type="number" min="1" max="5" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="extra">Keterangan Tambahan</label>
                                        <small class="help">(boleh dikosongkan)</small>
                                        <textarea name="extra" id="extra" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-md btn-primary shadow btn-icon-text mb-3" type="submit">
                                        <span class="btn-icon-prepend">
                                            <i class="fas fa-shopping-bag"></i>
                                        </span>
                                        Pesan Reward Ini
                                    </button>
                                    <p><small class="help">Dengan klik pesan, maka poin Anda akan terpotong sesuai harga reward.</small></p>
                                </form>
                            </div>
                        </div>
                        <?= anchor('admin/data_hadiah/', '<div class="btn btn-danger btn-sm">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
    </div>
</div>
</div>