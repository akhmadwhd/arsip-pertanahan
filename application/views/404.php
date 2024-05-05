<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if (isset($title)) {
            echo $title . " - ";
          } ?><?= $set->site_title ?></title>

  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/mdi/css/materialdesignicons.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/template/css/style.css') ?>">

  <script src="<?= base_url('/assets/template/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <!-- endinject -->
  <link href="<?= base_url('/assets/logo.png') ?>" rel="icon" />

</head>

<body>
<div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>SORRY!</h2>
                <h3 class="font-weight-light">The page you're looking for was not found.</h3>
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
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('/assets/template/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('/assets/template/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('/assets/template/js/jquery.cookie.js') ?>"></script>
  <script src="<?= base_url('/assets/template/js/template.js') ?>"></script>
  <script src="<?= base_url('/assets/template/js/misc.js') ?>"></script>
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