<form action="<?= site_url('Auth'); ?>" method="POST">
  <div class="flash-data" data-flashdata="<?php $this->session->flashdata('flash'); ?>"></div>
  <div class="row mt-5">
    <div class="col-lg-4 offset-lg-4">
      <div class="card">
        <div class="card-header h3 text-white <?= $tema_default['tema']; ?> text-center">Form Masuk</div>
        <div class="card-body">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="mb-3">
            <label for="sandi" class="form-label">Sandi</label>
            <input type="password" class="form-control" name="sandi">
          </div>
        </div>
        <div class="card-footer text-white <?= $tema_default['tema']; ?>">
          <a type="button" class="btn <?= $tema_default['tombol']; ?>" href="<?= site_url('Auth/daftar'); ?>"><i class="fa-solid fa-user-plus"></i> Daftar</a>
          <button type="submit" class="btn float-end <?= $tema_default['tombol']; ?>"><i class="fa-solid fa-right-to-bracket"></i> Masuk</button>
        </div>
      </div>
    </div>
  </div>
</form>