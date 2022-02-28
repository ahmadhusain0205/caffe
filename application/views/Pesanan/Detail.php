<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema'] ?> text-white h3">
        Detail Pesanan Atas Nama <?= $an['atas_nama']; ?>
        <a href="<?= site_url('Pesanan') ?>" type="button" class="btn btn-primary float-end"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a>
      </div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead class="text-center">
              <tr>
                <th width="1%">#</th>
                <th>Invoice</th>
                <th>Menu</th>
                <th>Qty</th>
                <th>Sub Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($pesanan as $p) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $p->invoice; ?></td>
                  <td>
                    <?php
                    $menu = $this->db->query('select nama from menu where id = ' . $p->id_menu)->row_array();
                    echo $menu['nama'];
                    ?>
                  </td>
                  <td><?= $p->qty; ?></td>
                  <td>Rp.
                    <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($p->sub_total); ?></a>
                  </td>
                  <td class="text-center">
                    <?php if ($p->bayar == 0) { ?>
                      <a href="<?= site_url('Pesanan/bayar_satuan/') . $p->id; ?>" class="btn btn-warning text-white" type="button" disable>
                        <i class="fa-solid fa-cash-register"></i> Bayar Satuan
                      </a>
                    <?php } else { ?>
                      <a class="btn btn-success text-white" type="button">
                        <i class="fa-solid fa-receipt"></i> Sudah Dibayar
                      </a>
                    <?php } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <a class="btn btn-primary" type="button" disable style="text-decoration: none;">
          <i class="fa-solid fa-money-bill-wave"></i> Total Bayar: <?= 'Rp. ' . number_format($total['total']); ?>
        </a>
        <a class="btn btn-danger" type="button" disable style="text-decoration: none;">
          <i class="fa-solid fa-hand-holding-dollar"></i> Kekurangan Bayar: <?= 'Rp. ' . number_format($kurang['kurang']); ?>
        </a>
        <a href="<?= site_url('Pesanan/bayar_semua/') . $an['invoice']; ?>" class="btn btn-danger float-end" type="button">
          <i class="fa-brands fa-gratipay"></i> Bayar Semua
        </a>
      </div>
    </div>
  </div>
</div>