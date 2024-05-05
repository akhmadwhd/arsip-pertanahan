<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php if (isset($title)) {
            echo $title . " - ";
          } ?><?= $set->site_title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/fontawesome-free/css/all.min.css') ?>">
  <link type="text/css" rel="stylesheet" href="<?= base_url('/assets/template/vendors/mdi/css/materialdesignicons.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/template/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.min.css') ?>">
  <script src="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <link href="<?= base_url('/assets/logo.png') ?>" rel="icon" type="image/x-icon" />

</head>

<body>
  <div class="container-scroller d-flex">
    <?php if ($kode == "2") { ?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0">ERR</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>MAAF!</h2>
                  <h3 class="font-weight-light">Dokumen bersifat Privat!</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                  <a class="text-white font-weight-medium" href="<?= base_url() ?>">Back to home</a>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 mt-xl-2">
                  <p class="text-white font-weight-medium text-center">Copyright &copy; <?= date('Y') ?> All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
    <?php } else { ?>
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="card">

          <div class="card-body">
            <h3 class="text-center mb-0">Arsip Pertanahan Kab. Morowali</h3>
            <h2 class="text-center font-weight-bold mb-3">Dokumen untuk Publik</h2>
            <hr />
            <!-- Form Name -->
            <div class="row">
              <div class="col-md-9">
                <!-- 1st column -->

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="namadokumen">Nama Pemilik</label>
                  <label class="col-md-9">: <?= $nama_dokumen; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="noarsip">Nomor KTP Pemilik</label>
                  <label class="col-md-9">: <?= $noarsip; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="uraian">Uraian</label>
                  <label class="col-md-9">: <?= $uraian; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="tanggal">Tanggal</label>
                  <label class="col-md-9">: <?= date_indo($tanggal, 'd F Y');?> </label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="pencipta">Kategori Arsip</label>
                  <label class="col-md-9">: <?= $nama_pencipta; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="unitpengolah">Unit Pengolah</label>
                  <label class="col-md-9">: <?= $nama_pengolah; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="kode">Kode Klasifikasi</label>
                  <label class="col-md-9">: <?= $nama_kode . " - " . $nama; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="lokasi">Lokasi Tanah</label>
                  <label class="col-md-9">: <?= $nama_lokasi; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="media">Jenis Media</label>
                  <label class="col-md-9">: <?= $nama_media; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="ket">Ket. Keaslian</label>
                  <label class="col-md-9">: <?= strtoupper($ket); ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="jumlah">Nomor Sertifikat</label>
                  <label class="col-md-9">: <?= $jumlah; ?></label>
                </div>

                <div class="mb-1 row">
                  <label class="col-md-3 control-label" for="nobox">Luas Lahan</label>
                  <label class="col-md-9">: <?= $nobox; ?></label>
                </div>

                <!--<div class="mb-1 row">
	<label class="col-md-3 control-label" for="user">Nama penginput</label>
	<label class="col-md-9">: <span class="badge badge-primary"><i class="fa fa-user"></i> <?= $username; ?></span></label>
</div>-->

              </div><!-- /1st column -->

              <div class="col-md-3">

                <div>
                  <div>QR Code</div>
                  <img src="<?= base_url('files/qrcode/' . $idarsip . '.png') ?>" width="150" alt="">
                </div>

              </div><!-- 2nd column -->

            </div><!-- /.row -->

            <hr />
            <p class="">Dokumen ini adalah Benar dan Tercatat dalam database, untuk memastikan bahwa dokumen tersebut benar, pastikan bahwa URL dalam browser anda adalah <?= base_url() ?> dan bentuk fisik dokumen sama seperti gambar di bawah ini</p>
            <hr />

            <div class="row">
              <div class="col-md-12">

                <h4>File Preview <span class="float-right"><i class="fa fa-download"></i> File: <?= ($file == "" ? "" : "<a href='" . base_url('files/' . $file) . "' target='_blank'>" . $file . "</a>"); ?></span>
                </h4>


                <iframe id="pdf-js-viewer" src="<?= base_url() ?>/vendor/pdfjs/web/viewer.html?file=<?= base_url('files/' . $file); ?>" title="webviewer" width="100%" frameborder="0" scrolling="yes" style="display:block; width:100%; height:100vh;">

              </div>
            </div><!-- /.row -->

          </div><!-- card-body -->

        <?php } ?>

        </div>

        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="<?= base_url('/assets/template/vendors/js/vendor.bundle.base.js') ?>"></script>
      <script src="<?= base_url('/assets/template/js/jquery.cookie.js') ?>"></script>
      <script src="<?= base_url('/assets/template/js/off-canvas.js') ?>"></script>
      <script src="<?= base_url('/assets/template/js/hoverable-collapse.js') ?>"></script>
      <script src="<?= base_url('/assets/template/js/template.js') ?>"></script>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: true,
          timer: 5000
        });
        <?php if ($message = $this->session->flashdata('success')) { ?>
          Toast.fire({
            icon: 'success',
            title: '<?= $message ?>.'
          })
        <?php } ?>
        <?php if ($message = $this->session->flashdata('error')) { ?>
          Toast.fire({
            icon: 'error',
            title: '<?= $message ?>.'
          })
        <?php } ?>
      </script>
</body>

</html>
