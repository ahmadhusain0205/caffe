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
          <button type="submit" class="btn <?= $tema_default['tombol'] ?> float-end"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
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
          </table>
        </div>
      </div>
    </div>
  </div>
</div>