<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema'] ?> text-white h3">Pesanan</div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead class="text-center">
              <tr>
                <th width="1%">#</th>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Meja</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($orderan as $o) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $o->invoice; ?></td>
                  <td><?= $o->atas_nama; ?></td>
                  <td><?= $o->no_meja; ?></td>
                  <td>Rp.
                    <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($o->total); ?></a>
                  </td>
                  <td class="text-center">
                    <a href="<?= site_url('Pesanan/detail/') . $o->invoice; ?>" class="btn btn-info text-white" type="button">
                      <i class="fa-solid fa-circle-info"></i> Detail
                    </a>
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