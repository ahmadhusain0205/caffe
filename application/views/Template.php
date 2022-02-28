<!doctype html>
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
  <nav class="navbar navbar-expand-lg navbar-dark <?= $tema_default['tema']; ?>">
    <div class="container">
      <a class="navbar-brand" href="<?= site_url('Welcome'); ?>">
        <b class="text-white">Coffe.Ku</b>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <?php if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'Welcome') { ?>
              <a class="nav-link active" href="<?= site_url('Welcome'); ?>"><i class="fa-solid fa-house"></i> Beranda</a>
            <?php } else { ?>
              <a class="nav-link" href="<?= site_url('Welcome'); ?>"><i class="fa-solid fa-house"></i> Beranda</a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if ($this->uri->segment(1) == 'Menu') { ?>
              <a class="nav-link active" href="<?= site_url('Menu'); ?>">
                <i class="fa-solid fa-receipt"></i> Menu
                <sup>
                  <?php
                  foreach ($total_order as $to) {
                    if (!empty($to->qty)) {
                      echo '+ ' . $to->qty;
                    }
                  }
                  ?>
                </sup>
              </a>
            <?php } else { ?>
              <a class="nav-link" href="<?= site_url('Menu'); ?>">
                <i class="fa-solid fa-receipt"></i> Menu
                <sup>
                  <?php
                  foreach ($total_order as $to) {
                    if (!empty($to->qty)) {
                      echo '+ ' . $to->qty;
                    }
                  }
                  ?>
                </sup>
              </a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if ($this->uri->segment(1) == 'Pesanan') { ?>
              <a class="nav-link active" href="<?= site_url('Pesanan'); ?>"><i class="fa-solid fa-cart-shopping"></i> Pesanan</a>
            <?php } else { ?>
              <a class="nav-link" href="<?= site_url('Pesanan'); ?>"><i class="fa-solid fa-cart-shopping"></i> Pesanan</a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if ($this->uri->segment(1) == 'Tema') { ?>
              <a class="nav-link active" href="<?= site_url('Tema'); ?>"><i class="fa-solid fa-fill-drip"></i> Tema</a>
            <?php } else { ?>
              <a class="nav-link" href="<?= site_url('Tema'); ?>"><i class="fa-solid fa-fill-drip"></i> Tema</a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if ($this->uri->segment(1) == 'Auth') { ?>
              <a class="nav-link active" href="<?= site_url('Auth'); ?>"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
            <?php } else { ?>
              <a class="nav-link" href="<?= site_url('Auth'); ?>"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container mt-3">
    <?= $content; ?>
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