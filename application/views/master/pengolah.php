<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
  <div class="col-12">
    <h2>Master Pengolah &nbsp;
      <?php if (isset($_SESSION['akses_modul']['pengolah']) && $_SESSION['akses_modul']['pengolah'] == 'on') : ?>
        <a class="btn bg-primary text-white" href="#" data-bs-toggle="modal" data-bs-target="#addpeng"><i class="fa fa-plus"></i> Tambah Baru</a>
      <?php endif; ?>
    </h2>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 ms-auto">
        <form>
          <div class="input-group">
            <input name="katakunci" class="form-control form-control-sm" type="search" placeholder="Kata kunci" aria-label="Search">
            <div class="input-group-append">
              <button class="btn bg-secondary text-white" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12" id="divtabelpeng">
        <div class="table-responsive">
          <table class="table table-bordered" name="vpeng" id="vpeng">
            <thead>
              <th class="width-sm">No</th>
              <th>Nama Unit Pengolah</th>
              <th class="width-sm"></th>
              <th class="width-sm"></th>
            </thead>
            <?php
            if (isset($peng)) {
              $no = 1;
              foreach ($peng as $u) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $u['nama_pengolah'] . "</td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#editpeng\" class='edpeng text-primary' href='#' id='" . $u['id'] . "' title=\"Edit\"><i class=\"fa fa-edit fa-lg\"></i> </a></td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#delpeng\" class='delpeng text-danger' href='#' id='" . $u['id'] . "' title=\"Delete\"><i class=\"fa fa-trash fa-lg\"></i> </a></td>";
                echo "</tr>";
                $no++;
              }
            }
            ?>
          </table>
        </div>
        <div class="mt-2">
          <?= $pages; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addpeng">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengolah Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="faddpeng" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/addpeng"); ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama Pengolah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="nama" name="nama" />
              <div class="errornama">
                <div class="small text-danger pt-1" id="errorNama"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="addpenggo">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="editpeng">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pengolah Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="error">
          <div class="small text-danger pt-1 mb-3" id="error"></div>
        </div>
        <form id="fedpeng" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/edpeng"); ?>">
          <input type="hidden" name="id" id="edidpeng" value="">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama Pengolah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="enama" name="nama" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="editpenggo">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delpeng">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Pengolah Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="fdelpeng" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/delpeng"); ?>">
          <h4 class="modal-title">Yakin ingin Hapus data ini?</h4>
          <input type="hidden" name="id" id="delidpeng" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="delpenggo">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->