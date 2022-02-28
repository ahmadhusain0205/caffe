<div class="row">
  <div class="col">
    <h2>Pilih Tema</h2>
  </div>
</div>
<hr>
<div class="row">
  <h3>Warna Latar Belakang</h3>
</div>
<br>
<div class="row mb-3">
  <?php foreach ($tema as $t) : ?>
    <a href="<?= site_url('Tema/ganti/') . $t->id; ?>" class="col-lg-3 text-white text-center" style="text-decoration: none;">
      <div class="card <?= $t->code; ?> mb-3">
        <h2 class="m-4"><?= strtoupper($t->warna); ?></h2>
      </div>
    </a>
  <?php endforeach; ?>
</div>
<div class="row">
  <h3>Warna Tombol</h3>
</div>
<br>
<div class="row mb-3">
  <?php foreach ($tombol as $tb) : ?>
    <a href="<?= site_url('Tema/ganti_tombol/') . $tb->id; ?>" class="col-lg-3 text-dark text-center" style="text-decoration: none;" type="button">
      <div class="card bg-light mb-3">
        <h2 class="m-4"><?= strtoupper($tb->warna); ?></h2>
      </div>
    </a>
  <?php endforeach; ?>
</div>