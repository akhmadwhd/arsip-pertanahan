<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row mb-2">
	<div class="col-md-8">
		<h2>Dokumen &nbsp;
		<a href="<?= site_url('/admin/entr'); ?>" role="button" aria-expanded="false" aria-controls="advanced-search" class="btn bg-primary text-white me-2"><i class="menu-icon mdi mdi-file-plus"></i> Entri Baru</a>
		</h2>
	</div>
	<div class="col-md-4">
		<div class="float-end">
			<a href="#" role="button" data-bs-toggle="modal" data-bs-target="#advanced-search" aria-expanded="false" aria-controls="advanced-search" class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-search"></i> Pencarian Lanjut</a>
			<a class="btn btn-success btn-sm text-white" href="<?= site_url('/home/dl') . ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '') ?>"><i class="fa fa-file-excel"></i> Ekspor ke Excel (XLS)</a>
		</div>
	</div>
</div>

<div class="card mb-4">
	<!-- modal -->
	<div class="modal fade" id="advanced-search" tabindex="-1" role="dialog" aria-labelledby="advanced-search" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header py-3">
					<h5 class="modal-title">Pencarian Lanjut</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= site_url('/home/search'); ?>" method="get" id="srcmain">
						<div class="row">
							<div class="col-md-6">

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">No KTP</label>
									<div class="col-sm-9">
										<input id="noarsip" name="noarsip" class="form-control input-md" type="text" value="<?= $src['noarsip'] ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Uraian</label>
									<div class="col-sm-9">
										<input id="uraian" name="uraian" class="form-control input-md" type="text" value="<?= $src['uraian'] ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Tanggal</label>
									<div class="col-sm-9">
										<input id="tanggal" name="tanggal" class="form-control input-md" type="text" value="<?= $src['tanggal'] ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Ket</label>
									<div class="col-sm-9">
										<select class="form-select" name="ket" id="ket">
											<option value="all">Semua</option>
											<option value="asli" <?= ($src['ket'] == 'asli' ? 'selected=selected' : ''); ?>>Asli</option>
											<option value="copy" <?= ($src['ket'] == 'copy' ? 'selected=selected' : ''); ?>>Copy</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Kode</label>
									<div class="col-sm-9">
										<select class="form-select" name="kode" id="zkode">
											<option value="all">Semua</option>
											<?php
											if (isset($kode)) {
												foreach ($kode as $p) {
													echo "<option value=\"" . $p['kode'] . "\" " . ($src['kode'] == $p['kode'] ? "selected=selected" : "") . ">" . $p['kode'] . " - " . $p['nama'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>

							</div>
							<div class="col-md-6">

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Bagian</label>
									<div class="col-sm-9">
										<select class="form-select" name="penc" id="penc">
											<option value="all">Semua</option>
											<?php
											if (isset($penc)) {
												foreach ($penc as $p) {
													echo "<option value=\"" . $p['id'] . "\" " . ($src['penc'] == $p['id'] ? "selected=selected" : "") . ">" . " - " . $p['nama_pencipta'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Unit</label>
									<div class="col-sm-9">
										<select class="form-select" name="peng" id="peng">
											<option value="all">Semua</option>
											<?php
											if (isset($peng)) {
												foreach ($peng as $p) {
													echo "<option value=\"" . $p['id'] . "\" " . ($src['peng'] == $p['id'] ? "selected=selected" : "") . ">" . " - " . $p['nama_pengolah'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Lokasi</label>
									<div class="col-sm-9">
										<select class="form-select" name="lok" id="lok">
											<option value="all">Semua</option>
											<?php
											if (isset($lok)) {
												foreach ($lok as $p) {
													echo "<option value=\"" . $p['id'] . "\" " . ($src['lok'] == $p['id'] ? "selected=selected" : "") . ">" . " - " . $p['nama_lokasi'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Media</label>
									<div class="col-sm-9">
										<select class="form-select" name="med" id="med">
											<option value="all">Semua</option>
											<?php
											if (isset($med)) {
												foreach ($med as $p) {
													echo "<option value=\"" . $p['id'] . "\" " . ($src['med'] == $p['id'] ? "selected=selected" : "") . ">" . " - " . $p['nama_media'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Luas Lahan</label>
									<div class="col-sm-9">
										<input id="nobox" name="nobox" class="form-control input-md" type="text" value="<?= $src['nobox'] ?>">
									</div>
								</div>

							</div>



						</div>

						<div class="form-group">
							<button class="btn btn-primary" type="submit" id="singlebutton" name="singlebutton"><i class="fa fa-search"></i> Cari</button>
						</div>

					</form>
				</div>
				<!-- ./modal body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ./modal -->

	<div class="card-body">

		<!--<?php
			//if ($this->session->flashdata('zz')) {
			//echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('zz') . '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			//<span aria-hidden="true">&times;</span>
			//</button></div>';
			//}
			?>-->
		<!-- /.row -->
		<!-- Page Features -->
		<div class="table-responsive">
			<?php if (!empty($data)) { ?>
				<table class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No KTP</th>
							<th>Nama Pemilik</th>
							<th>Tanggal</th>
							<th>User</th>
							<th>File</th>
							<th class="width-sm"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $a) {
							echo "<tr>";
							echo "<td>" . $a['noarsip'] . "</td>";
							echo "<td>" . $a['nama_dokumen'] . "</td>";
							echo "<td>" . $a['tanggal'] . "</td>";
							echo "<td align=\"center\"><span class=\"badge badge-primary\">" . $a['username'] . "</span></td>";
							if ($a['file'] == "") {
								echo "<td></td>";
							} else {
								echo "<td align=\"center\"><a href='" . base_url('files/' . $a['file']) . "' target='_blank'><i class='fa fa-file fa-lg' aria-hidden='true'></i></a></td>";
							}
							echo "<td align=\"center\"><a class=\"me-4\" href='" . site_url('home/view/' . encrypt_url($a['id'])) . "' ><i class=\"fa fa-eye fa-lg text-primary\"></i></a>";
							echo "<a class=\"me-4\" href=\"#arsip-" . encrypt_url($a['id']) . "\" data-bs-toggle=\"modal\" data-bs-target=\"#arsip-" . encrypt_url($a['id']) . "\"><i class='fa fa-qrcode fa-lg' aria-hidden='true'></i></a>
							<div class=\"modal fade\" id=\"arsip-" . encrypt_url($a['id']) . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"arsipLabel\" aria-hidden=\"true\">
                      <div class=\"modal-dialog\" role=\"document\">
                        <div class=\"modal-content\">
                          <div class=\"modal-header py-2\">
                            <h5 class=\"modal-title\" id=\"arsipLabel\">QR Code Untuk Publik</h5>
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                          </div>
                          <div class=\"modal-body\">
                            <img src=" . base_url('files/qrcode/' . $a['idarsip'] . '.png') . " alt=\"\" style=\"width: 50%;min-width: 50%;height:50%;border-radius: 0;\">
							<div>
							<p>" . $a['nama_dokumen'] . "<br/>
							No. " . $a['noarsip'] . "</p>
							<a href=" . base_url('dokumen/detail/' . $a['idarsip'] . '') . " target=\"_blank\">Buka Link</a></div>
                          </div>
                          <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
							";
							echo "";
							if (isset($_SESSION['akses_modul']['entridata']) && $_SESSION['akses_modul']['entridata'] == 'on') {
								echo "<a class=\"me-4\" href='" . site_url('/admin/vedit/' . encrypt_url($a['id'])) . "'><i class='fa fa-pencil fa-lg text-primary' aria-hidden='true'></i></a>";
							}
							echo "";
							echo "";
							if (isset($_SESSION['akses_modul']['entridata']) && $_SESSION['akses_modul']['entridata'] == 'on') {
								echo "<a class='deldata' id='" . $a['id'] . "' href='#' data-bs-toggle=\"modal\" data-bs-target=\"#deldata\"><i class=\"fa fa-trash fa-lg text-danger\"></i></a>";
							}
							echo "</td>";
							echo "</tr>";
						} ?>

					</tbody>
				</table>
			<?php
			} else { ?>
				<div class="text-center">
					<img class="img-fluid" src="<?= base_url('assets/no-data.png') ?>" alt="Tidak ada Data">
				</div>
			<?php } ?>
		</div><!-- table responsive -->

		<div class="mt-2">
			<?php
			echo $pages;
			?>
		</div>
		<!-- /.row -->
	</div>
</div>

<div class="modal fade" id="deldata">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Hapus Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fdeldata" class="form-horizontal" role="form" method="post" action="<?= site_url("/admin/del1"); ?>">
					<h4 class="modal-title">Apakah anda yakin ingin Hapus Data ini?</h4>
					<input type="hidden" name="id" id="deliddata" value="">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn bg-primary text-white" id="deldatago">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
