<div class="row mb-3">
  <div class="col">
    <div class="card <?= $tema_default['tema']; ?>">
      <form action="<?= site_url('Welcome/cari'); ?>" method="POST">
        <div class="row p-3">
          <div class="col-sm-10 form-group input-group">
            <input type="text" name="nama" class="form-control" required placeholder="Cari nama menu...">
            <span class="input-group-btn">
              <button type="submit" class="btn <?= $tema_default['tombol']; ?> btn-flat form-group">
                <i class=" fa-solid fa-magnifying-glass"></i>
              </button>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="row">
  <?php foreach ($menu as $m) : ?>
    <div class="col-lg-3 mb-3">
      <div class="card">
        <div class="card-header <?= $tema_default['tema']; ?>">
          <h4 class="text-center text-white"><?= ucfirst($m->nama); ?></h4>
        </div>
        <div class="card-body">
          <img src="<?= base_url('assets/img/menu/') . $m->gambar; ?>" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail rounded mx-auto d-block">
          <hr>
          <div class="text-center">
            <h5><?= $m->jenis; ?></h5>
            <h5>Stok: <?= $m->qty; ?></h5>
            <h5>Rp.<?= number_format($m->harga); ?>/satuan</h5>
          </div>
        </div>
        <div class="card-footer <?= $tema_default['tema']; ?> text-center">
          <a href="<?= site_url('Menu/orderan/') . $m->id; ?>" type="button" class="btn <?= $tema_default['tombol']; ?>"><i class="fa-solid fa-cart-arrow-down"></i> Pesan</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>