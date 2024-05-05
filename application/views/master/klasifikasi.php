<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
  <div class="col-12">
    <h2>Master Klasifikasi &nbsp;
      <?php if (isset($_SESSION['akses_modul']['klasifikasi']) && $_SESSION['akses_modul']['klasifikasi'] == 'on') : ?>
        <a class="btn bg-primary text-white" href="#" data-bs-toggle="modal" data-bs-target="#addkode"><i class="fa fa-plus"></i> Tambah Baru</a>
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
      <div class="col-md-12" id="divtabelkode">
        <div class="table-responsive">
          <table class="table table-bordered" name="vkode" id="vkode">
            <thead>
              <th>Kode</th>
              <th>Nama</th>
              <th>Retensi</th>
              <th class="width-sm"></th>
              <th class="width-sm"></th>
            </thead>
            <?php
            if (isset($user)) {
              $no = 1;
              foreach ($user as $u) {
                echo "<tr>";
                //echo "<td>".$no."</td>";
                echo "<td>" . $u['kode'] . "</td>";
                echo "<td>" . $u['nama'] . "</td>";
                echo "<td>" . $u['retensi'] . " Tahun</td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#editkode\" class='edkode text-primary' href='#' id='" . $u['id'] . "' title=\"Edit\"><i class=\"fa fa-edit fa-lg\"></i></a></td>";
                echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#delkode\" class='delkode text-danger' href='#' id='" . $u['id'] . "' title=\"Delete\"><i class=\"fa fa-trash fa-lg\"></i></a></td>";
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

<div class="modal fade" id="addkode">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5 class="modal-title">Tambah Klasifikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="faddkode" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/addkode"); ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="kode">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="kode" name="kode" />
              <div class="errorkode">
                <div class="small text-danger pt-1" id="errorKode"></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="nama" name="nama" />
              <div class="errornama">
                <div class="small text-danger pt-1" id="errorNama"></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="retensi">Retensi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="retensi" name="retensi" />
              <div class="errorretensi">
                <div class="small text-danger pt-1" id="errorRetensi"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="addkodego">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="editkode">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5 class="modal-title">Edit Klasifikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="error">
          <div class="small text-danger pt-1 mb-3" id="error"></div>
        </div>
        <form id="fedkode" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/edkode"); ?>">
          <input type="hidden" name="id" id="edidkode" value="">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="kode">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="ekode" name="kode" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nama">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="enama" name="nama" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="retensi">Retensi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" id="eretensi" name="retensi" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="editkodego">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delkode">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <h5>Delete Klasifikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="fdelkode" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/delkode"); ?>">
          <h4 class="modal-title">Yakin ingin Hapus data ini?</h4>
          <input type="hidden" name="id" id="delidkode" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-primary text-white" id="delkodego">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->