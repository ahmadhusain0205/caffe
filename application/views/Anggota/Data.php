<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema']; ?>">
        <div class="h4 text-white">
          Daftar Anggota
        </div>
      </div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead>
              <tr class="text-center">
                <th width="1%">#</th>
                <th>Foto</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Hp</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($anggota as $a) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center">
                    <img src="<?= base_url('assets/img/user/') . $a->foto; ?>" class="rounded" style="width: 100px; height:100px;">
                  </td>
                  <td><?= $a->username; ?></td>
                  <td><?= $a->nama; ?></td>
                  <td><?= $a->alamat; ?></td>
                  <td>
                    <a style="text-decoration: none;" class="text-dark float-end"><?= $a->no_hp; ?></a>
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