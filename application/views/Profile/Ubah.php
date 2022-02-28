<?= form_open_multipart('Profile/ubah_proses'); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="row mt-5">
  <div class="col-lg-4 offset-lg-4">
    <div class="card">
      <div class="card-header h3 text-white <?= $tema_default['tema']; ?> text-center"><?= $judul; ?></div>
      <div class="card-body">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat" value="<?= $user['alamat'] ?>">
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label">Nomor Hp</label>
          <input type="number" class="form-control" name="no_hp" value="<?= $user['no_hp'] ?>">
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Foto Profile</label>
          <div class="custom-file">
            <div class="row">
              <div class="col-sm-2">
                <img src="<?= base_url('assets/img/user/') . $user['foto']; ?>" class="rounded" style="width: 50px; width:50px;">
              </div>
              <div class="col">
                <input type="file" class="custom-file-input form-control text-white" id="foto" name="foto" style="border:0; background:rgba(0, 0, 0, 5); margin-top:10px;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-white <?= $tema_default['tema']; ?>">
        <button type="submit" class="btn float-end <?= $tema_default['tombol']; ?>"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
<?= form_close(); ?>