<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header <?= $tema_default['tema']; ?>">
        <div class="h4 text-white">
          Daftar Menu
          <button type="button" class="btn float-end <?= $tema_default['tombol']; ?>" data-bs-toggle="modal" data-bs-target="#add_menu">
            <i class="fa-solid fa-circle-plus"></i> Tambah Menu
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="responsive">
          <table class="table table-striped table-bordered" id="table">
            <thead>
              <tr class="text-center">
                <th width="1%">#</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th width="17%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($menu as $m) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center">
                    <img src="<?= base_url('assets/img/menu/') . $m->gambar; ?>" class="rounded" style="width: 70px; height:70px;">
                  </td>
                  <td><?= strtoupper($m->nama); ?></td>
                  <td>Rp.
                    <a class="float-end text-dark" style="text-decoration: none;"><?= number_format($m->harga); ?></a>
                  </td>
                  <td>
                    <a class="float-end text-dark" style="text-decoration: none;"><?= $m->qty; ?></a>
                  </td>
                  <td>
                    <button type="button" class="btn bg-warning text-white" data-bs-toggle="modal" data-bs-target="#edit_menu<?= $m->id; ?>">
                      <i class="fa-solid fa-square-pen"></i> Ubah
                    </button>
                    <button type="button" class="btn float-end bg-danger text-white" data-bs-toggle="modal" data-bs-target="#delete_menu<?= $m->id; ?>">
                      <i class="fa-solid fa-square-xmark"></i> Hapus
                    </button>
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

<!-- modal add_menu -->
<?= form_open_multipart('Menu/add'); ?>
<div class="modal fade" id="add_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header <?= $tema_default['tema']; ?> text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="gambar" class="form-label">Foto Profile</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input form-control text-white" id="foto" name="foto" style="border:0; background:rgba(0, 0, 0, 5); margin-top:10px;">
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Menu</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Menu</label>
          <input type="number" class="form-control" name="harga">
        </div>
        <div class="mb-3">
          <label for="qty" class="form-label">Qty</label>
          <input type="number" class="form-control" name="qty">
        </div>
        <div class="mb-3">
          <label for="jenis" class="form-label">Jenis Menu</label>
          <select name="jenis" class="form-control">
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
          </select>
        </div>
      </div>
      <div class="modal-footer <?= $tema_default['tema']; ?>">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambah</button>
      </div>
    </div>
  </div>
</div>
<?= form_close(); ?>

<!-- modal hapus_menu -->
<?php foreach ($menu as $m) : ?>
  <div class="modal fade" id="delete_menu<?= $m->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header <?= $tema_default['tema']; ?> text-white">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Menu</h5>
          <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="<?= base_url('assets/img/menu/') . $m->gambar; ?>" class="rounded img-thumbnail mb-4" style="width: 150px; width:150px;">
          <br>
          <?= strtoupper($m->nama); ?>
        </div>
        <div class="modal-footer <?= $tema_default['tema']; ?>">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
          <a type="button" href="<?= site_url('Menu/delete/') . $m->id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal ubah menu -->
<?php foreach ($menu as $m) : ?>
  <?= form_open_multipart('Menu/Edit'); ?>
  <div class="modal fade" id="edit_menu<?= $m->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header <?= $tema_default['tema']; ?> text-white">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Menu</h5>
          <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="gambar" class="form-label">Foto Menu</label>
            <div class="custom-file">
              <div class="row">
                <div class="col-sm-2">
                  <img src="<?= base_url('assets/img/menu/') . $m->gambar; ?>" class="rounded" style="width: 50px; width:50px;">
                </div>
                <div class="col">
                  <input type="file" class="custom-file-input form-control text-white" id="gambar" name="gambar" style="border:0; background:rgba(0, 0, 0, 5); margin-top:10px;">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="hidden" class="form-control" name="id" value="<?= $m->id; ?>">
            <input type="text" class="form-control" name="nama" value="<?= $m->nama; ?>">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga Menu</label>
            <input type="number" class="form-control" name="harga" value="<?= $m->harga; ?>">
          </div>
          <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input type="number" class="form-control" name="qty" value="<?= $m->qty; ?>">
          </div>
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Menu</label>
            <select name="jenis" class="form-control">
              <option value="<?= $m->jenis; ?>"><?= 'saat ini jenis ' . $m->jenis; ?></option>
              <option value="makanan">ubah ke Makanan</option>
              <option value="minuman">ubah ke Minuman</option>
            </select>
          </div>
        </div>
        <div class="modal-footer <?= $tema_default['tema']; ?>">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambah</button>
        </div>
      </div>
    </div>
  </div>
  <?= form_close(); ?>
<?php endforeach; ?>