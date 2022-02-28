<?= form_open_multipart('Auth/daftar'); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="row mt-5">
  <div class="col-lg-4 offset-lg-4">
    <div class="card">
      <div class="card-header h3 text-white <?= $tema_default['tema']; ?> text-center">Form Daftar</div>
      <div class="card-body">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
          <label for="sandi" class="form-label">Sandi</label>
          <input type="password" class="form-control" name="sandi">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label">Nomor Hp</label>
          <input type="number" class="form-control" name="no_hp">
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Foto Profile</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input form-control text-white" id="foto" name="foto" style="border:0; background:rgba(0, 0, 0, 5); margin-top:10px;">
          </div>
        </div>
      </div>
      <div class="card-footer text-white <?= $tema_default['tema']; ?>">
        <a type="button" class="btn <?= $tema_default['tombol']; ?>" href="<?= site_url('Auth'); ?>"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
        <button type="submit" class="btn float-end <?= $tema_default['tombol']; ?>"><i class="fa-solid fa-user-plus"></i> Daftar</button>
      </div>
    </div>
  </div>
</div>
<?= form_close(); ?>