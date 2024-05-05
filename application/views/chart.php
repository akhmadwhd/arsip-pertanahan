<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row mb-2">
  <div class="col-12">
    <h2>Grafik Chart</h2>
  </div>
</div>

<form class="row row-cols-lg-auto g-3 align-items-center mb-3">
  <div class="col-12">
    <label>Pilih Tahun</label>
  </div>
  <div class="col-12">
    <select name="katakunci" class="form-select">
      <option>-- Pilih Tahun --</option>
      <?php
      $starting_year  = date('Y', strtotime('-100 year'));
      $ending_year = date('Y', strtotime('+100 year'));
      $current_year = date('Y');
      for ($starting_year; $starting_year <= $ending_year; $starting_year++) {
        echo '<option value="' . $starting_year . '"';
        if ($starting_year ==  $katakunci) {
          echo ' selected="selected"';
        }
        echo ' >' . $starting_year . '</option>';
      }
      ?>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn bg-primary text-white"><i class="mdi mdi-refresh"></i> Lihat</button>
  </div>
</form>

<div class="row">
  <div class="col-md-12 grid-margin">
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


  <div class="col-md-12 grid-margin">
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
