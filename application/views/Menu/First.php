<form action="<?= site_url('Menu/pesanan'); ?>" method="POST">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header <?= $tema_default['tema'] ?> text-white h3">Orderan</div>
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Atas Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="atas_nama" placeholder="Atas nama...">
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Meja</label>
                <div class="col-sm-10">
                  <select name="no_meja" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col responsive">
              <table class="table table-striped table-bordered">
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
                  foreach ($pesanan as $p) :  ?>
                    <tr>
                      <td><?= $no++;; ?></td>
                      <td><?= $p->invoice; ?></td>
                      <td>
                        <?php
                        $menu = $this->db->query('select nama from menu where id = ' . $p->id_menu)->row_array();
                        echo $menu['nama'];
                        ?>
                      </td>
                      <td>
                        <a class="float-end text-dark" style="text-decoration: none;"><?= $p->qty; ?></a>
                      </td>
                      <td>Rp.
                        <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($p->sub_total); ?></a>
                      </td>
                      <td class="text-center">
                        <a href="<?= site_url('Menu/batal/') . $p->id ?>" type="button" class="btn btn-danger">
                          <i class="fa-solid fa-circle-xmark"></i> Batal
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer <?= $tema_default['tema'] ?>">
          <button type="submit" class="btn <?= $tema_default['tombol'] ?> float-end"><i class="fa-solid fa-square-check"></i> Pesan</button>
        </div>
      </div>
    </div>
  </div>
</form>