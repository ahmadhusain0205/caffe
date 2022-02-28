<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema']; ?>">
        <div class="h4 text-white">
          Transaksi Selesai
        </div>
      </div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead>
              <tr class="text-center">
                <th width="1%">#</th>
                <th>Tanggal Order</th>
                <th>Invoice</th>
                <th>Nama Menu</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($laporan as $l) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $l->tanggal; ?></td>
                  <td><?= $l->invoice; ?></td>
                  <td><?= $l->nama; ?></td>
                  <td>
                    <a class="text-dark float-end" style="text-decoration: none;"><?= $l->qty; ?></a>
                  </td>
                  <td>Rp.
                    <a class="text-dark float-end" style="text-decoration: none;"><?= number_format($l->harga); ?></a>
                  </td>
                  <td>Rp.
                    <a class="text-dark float-end" style="text-decoration: none;"><?= number_format($l->sub_total); ?></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>