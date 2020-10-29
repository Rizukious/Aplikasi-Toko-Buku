<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Barang</h3>

    <?php foreach($barang as $brg) : ?>
        <form action="<?= base_url().'admin/data_barang/update'?>" method="post">
            <div class="form-group">
              <label for="">Nama Barang</label>
              <input type="text" name="nama_brg" id="" class="form-control" value="<?= $brg->nama_brg ?>">
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="hidden" name="id_brg" id="" class="form-control" value="<?= $brg->id_brg ?>">
              <input type="text" name="keterangan" id="" class="form-control" value="<?= $brg->keterangan ?>">
            </div>
            <div class="form-group">
              <label for="">Kategori</label>
              <input type="text" name="kategori" id="" class="form-control" value="<?= $brg->kategori ?>">
            </div>
            <div class="form-group">
              <label for="">Harga</label>
              <input type="text" name="harga" id="" class="form-control" value="<?= $brg->harga ?>">
            </div>
            <div class="form-group">
              <label for="">Stok</label>
              <input type="text" name="stok" id="" class="form-control" value="<?= $brg->stok ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
        </form>
    <?php endforeach;?>
</div>