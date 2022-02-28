<div class="row">
  <div class="col-lg-6 offset-lg-3">
    <div class="card">
      <div class="card-header <?= $tema_default['tema'] ?>">
        <div class="h4 text-white">Profil Ku
          <a href="<?= site_url('Beranda'); ?>" type=" button" class="btn <?= $tema_default['tombol'] ?> float-end"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="row g-0">
              <div class="col-md-4 m-auto">
                <img src="<?= base_url('assets/img/user/') . $user['foto'] ?>" class="img-fluid rounded" alt="...">
              </div>
              <div class="col-md-8 m-auto">
                <div class="card-body" style="padding-left: 40px;">
                  <h5 class="card-title h2"><?= $user['username']; ?></h5>
                  <hr>
                  <p class="card-text"><?= $user['nama']; ?></p>
                  <hr>
                  <p class="card-text"><?= $user['alamat']; ?></p>
                  <hr>
                  <p class="card-text"><?= $user['no_hp']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer <?= $tema_default['tema'] ?>">
        <a href="<?= site_url('Profile/ubah'); ?>" type="button" class="btn <?= $tema_default['tombol'] ?> float-end"><i class="fa-solid fa-user-pen"></i> Ubah</a>
      </div>
    </div>
  </div>
</div>