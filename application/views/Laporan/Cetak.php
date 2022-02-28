<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/fontawesome/css/all.min.css" type="text/css">
  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title><?= $judul; ?></title>

  <!-- datatables -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/jquery.dataTables.min.css" type="text/css">
</head>

<body>
  <div class="mt-5 text-center h2"><u>Laporan Penjualan</u></div>
  <div class="text-center mr-3">Tanggal: <?= date('D, d-M-Y') ?></div>
  <hr>
  <div class="row p-5">
    <div class="responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr class="text-center">
            <th width="1%">#</th>
            <th>Tanggal</th>
            <th>Invoice</th>
            <th>Nama Menu</th>
            <th>Qty</th>
            <th>Harga Satuan</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($laporan as $l) :
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $l->tanggal; ?></td>
              <td><?= $l->invoice; ?></td>
              <td><?= strtoupper($l->nama); ?></td>
              <td>
                <a class="float-end text-dark" style="text-decoration: none;">
                  <?= $l->qty; ?>
                </a>
              </td>
              <td>Rp.
                <a class="float-end text-dark" style="text-decoration: none;">
                  <?= number_format($l->harga); ?>
                </a>
              </td>
              <td>Rp.
                <a class="float-end text-dark" style="text-decoration: none;">
                  <?= number_format($l->sub_total); ?>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6" class="text-center">Total</th>
            <th>
              <?php
              $total = $this->db->query('select sum(sub_total) as total from pembukuan')->result();
              foreach ($total as $t) { ?>
                Rp. <a class="float-end text-dark" style="text-decoration: none;" style="text-decoration: none;"><?= number_format($t->total); ?></a>
              <?php }
              ?>
            </th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="<?= base_url('assets'); ?>/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <script src="<?= base_url('assets'); ?>/js/jquery-3.5.1.js"></script>
  <script src="<?= base_url('assets'); ?>/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#table').DataTable();
    });
  </script>
  <!-- sweetalert -->
  <script src="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.all.min.js"></script>

  <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>
</body>

</html>