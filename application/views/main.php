<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1 class="mb-3">Dashboard</h1>

<div class="row">
  <?php if ($_SESSION['tipe'] == 'admin' || $_SESSION['tipe'] == 'operator') { ?>
    <div class="col-lg-4 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-gradient-primary d-flex align-items-center">
        <div class="card-body py-5">
          <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-folder-multiple icon-lg text-white"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
              <h3 class="font-weight-bold"><a class="text-white text-decoration-none" href="<?= base_url('/home/search') ?>" alt="Jumlah Dokumen">Jumlah Dokumen</a></h3>
              <h1 class="font-weight-medium mb-0 text-white"><?= $countArsip->jumlah; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-lg-4 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-gradient-warning d-flex align-items-center">
        <div class="card-body py-5">
          <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-swap-horizontal-bold icon-lg text-white"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
              <h3 class="font-weight-bold"><a class="text-white text-decoration-none" href="<?= base_url('/sirkulasi') ?>" alt="Sirkulasi" class="text-white">Jumlah Sirkulasi</a></h3>
              <div class="fluid-container">
                <h1 class="font-weight-medium mb-0 text-white"><?= $countSirkulasi->jumlah; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col-lg-4 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-gradient-success d-flex align-items-center">
        <div class="card-body py-5">
          <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-account-multiple icon-lg text-white"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
              <h3 class="font-weight-bold"><a class="text-white text-decoration-none" href="<?= base_url('/admin/vuser') ?>" alt="Pengguna" class="text-dark">Jumlah Pengguna</a></h5>
                <div class="fluid-container">
                  <h1 class="font-weight-medium mb-0 text-white"><?= $countUser->jumlah; ?></h1>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="col-lg-4 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-gradient-primary d-flex align-items-center">
        <div class="card-body py-5">
          <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-folder-multiple icon-lg text-white"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
              <h3 class="font-weight-bold"><a class="text-white text-decoration-none" href="<?= base_url('/home/search') ?>" alt="Dokumen anda">Dokumen anda</a></h3>
              <h1 class="font-weight-medium mb-0 text-white"><?= $countArsip->jumlah; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-lg-4 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-gradient-warning d-flex align-items-center">
        <div class="card-body py-5">
          <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-swap-horizontal-bold icon-lg text-white"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
              <h3 class="font-weight-bold"><a class="text-white text-decoration-none" href="<?= base_url('/sirkulasi') ?>" alt="Sirkulasi anda" class="text-white">Sirkulasi anda</a></h3>
              <div class="fluid-container">
                <h1 class="font-weight-medium mb-0 text-white"><?= $countSirkulasi->jumlah; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  <?php } ?>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="chart-container">
          <div class="bar-chart-container">
            <canvas id="bar-chart1"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="chart-container">
          <div class="bar-chart-container">
            <canvas id="bar-chart2"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
			<div class="card-body">

				<div class="chart-container">
				<div class="bar-chart-container">
				<canvas id="bar-chart3"></canvas>
				</div>
				</div>

			</div>
			</div>
		</div>-->

</div>

<script src="<?= base_url('/assets/template/vendors/chart.js/Chart.min.js') ?>"></script>
<script>
  $(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?= $chart1_data; ?>`);
    console.log(cData);
    var ctx = $("#bar-chart1");

    //bar chart data
    var data = {
      labels: cData.label,
      datasets: [{
        label: cData.label,
        data: cData.data,
        backgroundColor: ChartColor[1],
        borderColor: ChartColor[1],
        borderWidth: 0
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Jumlah Arsip Per-Bulan",
        fontSize: 16,
        //fontColor: "#333"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          //fontColor: "#333",
          fontSize: 14
        }
      }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<script>
  $(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?= $chart2_data; ?>`);
    console.log(cData);
    var ctx = $("#bar-chart2");

    //bar chart data
    var data = {
      labels: cData.label,
      datasets: [{
        data: cData.data,
        backgroundColor: ChartColor[2],
        borderColor: ChartColor[2],
        borderWidth: 0
      }]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Jumlah Arsip Per-Lokasi",
        fontSize: 16,
        //fontColor: "#333"
      },
      legend: {
        display: false,
        position: "bottom",
        labels: {
          //fontColor: "#333",
          fontSize: 14
        }
      }
    };

    //create bar Chart class object
    var chart2 = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });

  });
</script>

<!--<script>
  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php //echo $chart3_data;
                              ?>`);
      console.log(cData);
      var ctx = $("#bar-chart3");

      //bar chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: cData.label,
            data: cData.data,
			backgroundColor: ChartColor[3],
          	borderColor: ChartColor[3],
          	borderWidth: 0
          }
        ]
      };

      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Jumlah Peminjaman Per-Bulan",
          fontSize: 16,
          //fontColor: "#333"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            //fontColor: "#333",
            fontSize: 14
          }
        }
      };

      //create bar Chart class object
      var chart3 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });

  });
</script>-->
