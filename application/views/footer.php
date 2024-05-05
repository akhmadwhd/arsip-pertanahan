<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<footer class="footer mt-3">
  <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?= date('Y'); ?> <a target="_blank">Arsip Pertanahan Kab. Morowali</a>. All rights reserved.</span>

  </div>
</footer>

</div>
<!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('/assets/template/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('/assets/template/js/hoverable-collapse.js') ?>"></script>
<script src="<?= base_url('/assets/template/js/jquery.cookie.js') ?>"></script>
<script src="<?= base_url('/assets/template/js/template.js') ?>"></script>
<script src="<?= base_url('/assets/template/js/misc.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/datatables/js/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/dropify/js/dropify.min.js') ?>"></script>
<script src="<?= base_url('/assets/template/js/dropify.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('/assets/template/vendors/select2/select2.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/jquery.form.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/jquery.auto-complete.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('/assets/js/validation.js') ?>"></script>
<!-- End custom js for this page -->
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

  $(document).ready(function() {
    $('.select2').select2({
      theme: "bootstrap-5",
      placeholder: 'Select an option'
    });

    $('.select2-arsip').select2({
      theme: "bootstrap-5",
      ajax: {
        url: '<?= site_url('/sirkulasi/xhr_arsip'); ?>',
        dataType: 'json',
        data: function(params) {
          var query = {
            q: params.term,
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        },
      }
    });

    $('.select2-user').select2({
      theme: "bootstrap-5",
      ajax: {
        url: '<?= site_url('/sirkulasi/xhr_user'); ?>',
        dataType: 'json',
        data: function(params) {
          var query = {
            q: params.term,
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        },
      }
    });
  });
</script>

</body>

</html>
