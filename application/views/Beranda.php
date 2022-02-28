<div class="row mb-4">
  <div class="col">
    <a href="<?= site_url('Menu/data'); ?>" style="text-decoration: none;" class="text-dark">
      <div class="card border-primary mb-3 h-100 p-3">
        <div class="card-body">
          <div class="row">
            <div class="col-7">
              <div class="h3 text-primary">
                Jumlah Menu
              </div>
            </div>
            <div class="col h1">
              <div class="float-end">
                <?= $c_beranda; ?> <i class="fa-solid fa-clipboard-list"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col">
    <a href="<?= site_url('Transaksi'); ?>" style="text-decoration: none;" class="text-dark">
      <div class="card border-success mb-3 h-100 p-3">
        <div class="card-body">
          <div class="row">
            <div class="col-7">
              <div class="h3 text-success">
                Transaksi Berhasil
              </div>
            </div>
            <div class="col h1 m-auto">
              <div class="float-end">
                <?= $c_transaksi; ?> <i class="fa-solid fa-clipboard-check"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col">
    <a href="<?= site_url('Anggota'); ?>" style="text-decoration: none;" class="text-dark">
      <div class="card border-danger mb-3 h-100 p-3">
        <div class="card-body">
          <div class="row">
            <div class="col-7">
              <div class="h3 text-danger">
                Jumlah Anggota
              </div>
            </div>
            <div class="col h1 m-auto">
              <div class="float-end">
                <?= $c_user; ?> <i class="fa-solid fa-users"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col">
    <a href="<?= site_url('Profile'); ?>" style="text-decoration: none;" class="text-dark">
      <div class="card border-info mb-3 h-100">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="h3 text-info"><?= $user['nama']; ?></div>
              <hr>
              <div class="h5"><?= $user['alamat']; ?></div>
            </div>
            <div class="col h1 m-auto">
              <div class="text-center">
                <img src="<?= base_url('assets/img/user/') . $user['foto']; ?>" class="rounded" style="width: 100px; height:100px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>

<?php
// query
$menu = $this->db->query('select nama, sum(qty) as qty from laporan group by nama')->result();
foreach ($menu as $m) {
  // mengambil nama menu
  $nama = $m->nama;
  $nama_menu = $nama;
  // mengambil qty
  $qty = $m->qty;
  $qty_menu = $qty;
}
?>
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <div style="width: 100%;">
          <canvas id="myBar"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <div style="width: 100%;">
          <canvas id="myPie"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // myBar
  var ctx = document.getElementById('myBar').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
      labels: [
        <?php
        foreach ($menu as $me) {
          echo json_encode($me->nama) . ',';
        }
        ?>
      ],
      datasets: [{
        label: 'Data Transaksi',
        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
        borderColor: ['rgb(255, 99, 132)'],
        data: [
          <?php
          foreach ($menu as $me) {
            echo json_encode($me->qty) . ',';
          }
          ?>
        ]
      }]
    },

    // Configuration options go here
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
  // myPie
  var ctx = document.getElementById('myPie').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',
    // The data for our dataset
    data: {
      labels: [
        <?php
        foreach ($menu as $me) {
          echo json_encode($me->nama) . ',';
        }
        ?>
      ],
      datasets: [{
        label: 'Data Transaksi ',
        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
        borderColor: ['rgb(255, 99, 132)'],
        data: [
          <?php
          foreach ($menu as $me) {
            echo json_encode($me->qty) . ',';
          }
          ?>
        ]
      }]
    },

    // Configuration options go here
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>