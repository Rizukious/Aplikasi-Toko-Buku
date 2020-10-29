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
                                    <p>Alamat sudah di Setting dengan Alamat yang pernah anda isi pada saat pembelian buku, Bila Anda ingin mengganti alamat tujuan, Anda <a href="#new-destination-form" data-toggle="collapse">dapat menggantinya sekarang.</a></p>
                                    <p>
                                        <a href="#new-destination-form" data-toggle="collapse" class="btn btn-info shadow btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Cek Alamat Tujuan Reward</span>
                                        </a>
                                    </p>

                                    <div class="collapse card card-body bg-light" id="new-destination-form">
                                        <form method="POST" action="<?= base_url('dashboard/proses_pesanan_reward') ?>" accept-charset="UTF-8" role="form">
                                            <div class="form-group">
                                                <?php
                                                foreach ($tampil_hadiah as $th) : ?>
                                                    <label class="control-label">ID Reward</label>
                                                    <input type="text" name="id_hadiah" class="form-control" value="<?= $th->id_hadiah ?>" readonly>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                foreach ($tampil_invoice as $ti) : ?>
                                                    <label class="control-label">Nama Lengkap Penerima</label>
                                                    <input type="text" name="nama" class="form-control" value="<?= $ti->nama ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="contol-label">Alamat Penerima</label>
                                                <input type="text" name="alamat" class="form-control" value="<?= $ti->alamat ?>">
                                            <?php endforeach; ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Jumlah Pemesanan</label>
                                                <input type="number" name="jumlah" class="form-control" value="1">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="alert alert-warning d-flex align-items-center">
                                                    <div class="d-inline-flex pr-3">
                                                        <i class="fas fa-exclamation fa-2x"></i>
                                                    </div>
                                                    <div class="d-inline-flex">Mohon untuk memastikan isian di atas sudah benar. Kesalahan pengisian dapat mengganggu proses pengiriman Reward Anda.</div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-gift"></i>
                                                </span>
                                                <span class="text">Pesan Reward Ini</span>
                                            </button>

                                            <a class="btn btn-md btn-secondary shadow" href="#new-destination-form" data-toggle="collapse">
                                                Batal
                                            </a>
                                            <p><small class="help">Dengan klik pesan, maka poin Anda akan terpotong sesuai harga reward.</small></p>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?= anchor('reward/redeem/', '<div class="btn btn-danger btn-sm">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
    </div>
</div>
</div>