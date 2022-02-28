<form action="<?= site_url('Laporan/cari'); ?>" method="POST">
  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-header <?= $tema_default['tema'] ?>">
          <div class="h4 text-white">Cari Laporan</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="dari" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control" name="dari">
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="sampai" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control" name="sampai">
              </div>
            </div>
          </div>
          <button type="submit" class="btn <?= $tema_default['tombol'] ?> float-end text-white"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema'] ?>">
        <div class="h4 text-white">Laporan
          <a href="<?= site_url('Laporan/cetak'); ?>" type="button" class="btn <?= $tema_default['tombol'] ?> float-end" target="_BLANK"><i class="fa-solid fa-print"></i> Cetak</a>
          <a href="<?= site_url('Laporan/hapus'); ?>" type="button" class="btn <?= $tema_default['tombol'] ?> float-end" style="margin-right: 10px;"><i class="fa-solid fa-repeat"></i> Hapus Semua</a>
        </div>
      </div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead>
              <tr class="text-center">
                <th width="1%">#</th>
                <th>Tanggal</th>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Sub_total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($laporan as $l) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $l->tanggal; ?></td>
                  <td><?= $l->invoice; ?></td>
                  <td><?= strtoupper($l->nama); ?></td>
                  <td>
                    <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($l->qty); ?></a>
                  </td>
                  <td>
                    Rp. <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($l->harga); ?></a>
                  </td>
                  <td>
                    Rp. <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($l->sub_total); ?></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-center">Total</th>
                <th>
                  <?php
                  $total = $this->db->query('select sum(sub_total) as total from pembukuan')->result();
                  foreach ($total as $t) { ?>
                    Rp. <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($t->total); ?></a>
                  <?php }
                  ?>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>