<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
  <div class="col-12">
    <h2>Master Kategori Arsip &nbsp;
      <?php if (isset($_SESSION['akses_modul']['pencipta']) && $_SESSION['akses_modul']['pencipta'] == 'on') : ?>
        <a class="btn bg-primary text-white" href="#" data-bs-toggle="modal" data-bs-target="#addpenc"><i class="fa fa-plus"></i> Tambah Baru</a>
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
      <div class="col-md-12" id="divtabelpenc">
        <div class="table-responsive">
          <table class="table table-bordered" name="vpenc" id="vpenc">
            <thead>
              <th class="width-sm">No</th>
              <th>Nama Kategori</th>
              <th class="width-sm"></th>
              <th class="width-sm"></th>
            </thead>
            <?php
            if (isset($penc)) {
              $no = 1;
              foreach ($penc as $u) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $u['nama_pencipta'] . "</td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#editpenc\" class='edpenc text-primary' href='#' id='" . $u['id'] . "' title=\"Edit\"><i class=\"fa fa-edit fa-lg\"></i></a></td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#delpenc\" class='delpenc text-danger' href='#' id='" . $u['id'] . "' title=\"Delete\"><i class=\"fa fa-trash fa-lg\"></i></a></td>";
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

<div class="modal fade" id="addpenc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5 class="modal-title">Tambah Kategori Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="faddpenc" class="form-horizontal" role="form" method="post" action="<?= base_url("/admin/addpenc"); ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama Kategori</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="nama" name="nama" required="required" />
              <div class="errornama">
                <div class="small text-danger pt-1" id="errorNama"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="addpencgo">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="editpenc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5 class="modal-title">Edit Kategori Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="error">
          <div class="small text-danger pt-1 mb-3" id="error"></div>
        </div>
        <form id="fedpenc" class="form-horizontal" role="form" method="post" action="<?= base_url("/admin/edpenc"); ?>">
          <input type="hidden" name="id" id="edidpenc" value="">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama Kategori</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="enama" name="nama" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="editpencgo">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delpenc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5 class="modal-title">Delete Kategori Arsip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="fdelpenc" class="form-horizontal" role="form" method="post" action="<?= base_url("/admin/delpenc"); ?>">
          <h4 class="modal-title">Yakin ingin Hapus data ini?</h4>
          <input type="hidden" name="id" id="delidpenc" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="delpencgo">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
