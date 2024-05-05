<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login - <?= $set->site_title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/fontawesome-free/css/all.min.css') ?>">
  <link type="text/css" rel="stylesheet" href="<?= base_url('/assets/template/vendors/mdi/css/materialdesignicons.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/template/css/style.css') ?>">
  <script src="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <link href="<?= base_url('/assets/logo.png') ?>" rel="icon" type="image/x-icon" />
  <style>
    .form-control {
      font-size: 1em;
    }
  </style>
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">

      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">

          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row" style="background: url('<?= site_url('assets/images/') . $set->site_background ?>') no-repeat center center;background-size: cover; ">
          </div>

          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <h2>Selamat Datang di <?= $set->site_title ?></h2>


              <form class="pt-3 needs-validation" id="login" role="form" method="post" action="<?= site_url('/home/gologin'); ?>" novalidate>
                <?php
                if ($this->session->flashdata('erorlogin')) {
                  echo "<div <div class=\"alert alert-danger\" role=\"alert\"><h5><i class=\"fa fa-exclamation-triangle\"></i> Perhatian!</h5>" . $this->session->flashdata('erorlogin') . "</div>";
                }
                ?>
                <input type="hidden" name="previous" value="<?php echo (isset($previous) ? $previous : "") ?>">
                <div class="form-group">
                  <div class="input-group validate-input">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="height: 50px;">
                        <i class="mdi mdi-account-outline mdi-18px text-dark"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg" name="username" id="loginEmail" placeholder="username" required="" autofocus>
                    <div class="invalid-feedback">
                      Username belum diisi
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group validate-input">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="height: 50px;">
                        <i class="mdi mdi-lock-outline mdi-18px text-dark"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg" name="password" id="loginPass" placeholder="sandi" required="">
                    <div class="invalid-feedback">
                      Password belum diisi
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-block bg-primary btn-lg font-weight-medium auth-form-btn text-white" type="submit">Login</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  <p class="footer-text">Copyright © <?= date('Y') ?> <a >Arsip Pertanahan</a> Kabupaten Morowali. All rights reserved.</p>

                </div>
              </form>
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
