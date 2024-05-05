<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Edit Data</h2>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/home/search'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
	</div>
	<div class="card-body">
		<form id="Form" class="form-horizontal" data-toggle="validator" action="<?= site_url('/admin/edit'); ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<input type="hidden" name="id" value="<?= $id ?>">
				<!-- Form Name -->
				<div class="row">
					<div class="col-md-6">
						<!-- 1st column -->
						<div class="form-group">
							<label for="noarsip">Nomor KTP Pemilik</label>
							<input id="noarsip" name="noarsip" class="form-control" type="text" value="<?= $noarsip ?>" placeholder="Kode Arsip D-Angka (DIP4T) & PT-Angka (Pengadaan Tanah)" required>
						</div>

						<div class="form-group">
							<label for="nama_dokumen">Nama Pemilik</label>
							<input id="nama_dokumen" name="nama_dokumen" class="form-control" type="text" value="<?= $nama_dokumen ?>" required>
						</div>

						<div class="form-group">
							<label for="tanggal">Tanggal Penciptaan</label>
							<input id="tanggal" name="tanggal" class="form-control" type="text" value="<?= date('Y-m-d', strtotime($tanggal)); ?>" required>
						</div>

						<div class="form-group">
							<label for="pencipta">Kategori Arsip</label>
							<select id="pencipta" name="pencipta" class="form-select" required>
								<?php
								if (isset($pencipta2)) {
									foreach ($pencipta2 as $k) {
										echo "<option value='" . $k['id'] . "'" . ($pencipta == $k['id'] ? "selected=selected" : "") . " >" . $k['nama_pencipta'] . "</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="unitpengolah">Unit Pengolah</label>
							<select id="unitpengolah" name="unitpengolah" class="form-select" required>
								<?php
								if (isset($unitpengolah2)) {
									foreach ($unitpengolah2 as $k) {
										echo "<option value='" . $k['id'] . "'" . ($unit_pengolah == $k['id'] ? "selected=selected" : "") . " >" . $k['nama_pengolah'] . "</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="kode">Kode Klasifikasi</label>
							<select id="kode" name="kode" class="form-select" required>
								<?php
								if (isset($kode2)) {
									foreach ($kode2 as $k) {
										echo "<option value='" . $k['id'] . "'" . ($kode == $k['id'] ? "selected=selected" : "") . " >" . $k['nama'] . " - " . $k['kode'] . "</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="uraian">Uraian</label>
							<textarea id="uraian" name="uraian" class="form-control" rows="5" required><?= $uraian ?></textarea>
						</div>
					</div><!-- /1st column -->

					<div class="col-md-6">
						<!-- 2nd column -->
						<div class="form-group">
							<label for="lokasi">Lokasi Tanah</label>
							<select id="lokasi" name="lokasi" class="form-select" required>
								<?php
								if (isset($lokasi2)) {
									foreach ($lokasi2 as $k) {
										echo "<option value='" . $k['id'] . "'" . ($lokasi == $k['id'] ? "selected=selected" : "") . " >" . $k['nama_lokasi'] . "</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="media">Jenis Media</label>
							<select id="media" name="media" class="form-select" required>
								<?php
								if (isset($media2)) {
									foreach ($media2 as $k) {
										echo "<option value='" . $k['id'] . "'" . ($media == $k['id'] ? "selected=selected" : "") . " >" . $k['nama_media'] . "</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="ket">Keterangan Keaslian</label>
							<select class="form-select" name="ket" id="ket" required>
								<option value="asli" <?= ($ket == 'asli' ? "selected=selected" : "") ?>>Asli</option>
								<option value="copy" <?= ($ket == 'copy' ? "selected=selected" : "") ?>>Copy</option>
							</select>
						</div>

						<div class="form-group">
							<label for="jumlah">Nomor Sertifikat</label>
							<input id="jumlah" name="jumlah" class="form-control" type="text" value="<?= $jumlah ?>" required>
						</div>

						<div class="form-group">
							<label for="nobox">Luas Lahan</label>
							<input id="nobox" name="nobox" class="form-control" type="text" value="<?= $nobox ?>">
						</div>

						<div class="form-group">
							<label for="nobox">File</label>
							<?php
							if ($file != "") {
								echo "<br/><span style='text-overflow:ellipsis;overflow:hidden;' id='linkfile'><a href='" . base_url('files/' . $file) . "'>$file</a></span>";
								echo "<span class='ms-3'><a href='#' data-bs-toggle=\"modal\" data-bs-target=\"#delfile\"><span class='fa fa-remove fa-lg' style='color:red' aria-hidden='true'></span></a></span>";
								echo "<div id='uplodfile' style='display:none;'>";
							} else {
								echo "<div id='uplodfile'>";
							}
							echo "<input type='file' id='file' name='file' class='dropify' required>
							<p class='help-block'>Ukuran Maksimal " . number_format(ceil(max_file_upload_in_bytes() / 1000)) . "MB</p>";
							echo "</div>";
							?>
						</div>

					</div><!-- /2nd column -->
				</div><!-- /.row -->

				<div class="form-group">
					<div class="col-md-12">
						<button type="submit" class="btn bg-primary btn-lg text-white"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>

			</fieldset>
		</form>
	</div>
</div><!-- card -->

<div class="modal fade" id="delfile">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Hapus File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fdelfile" class="form-horizontal" role="form" method="post" action="<?= site_url("/admin/delfile"); ?>">
					<h4 class="modal-title">Apakah anda yakin ingin Hapus File ini?</h4>
					<input type="hidden" name="id" id="delidfile" value="<?= $id ?>">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" id="delfilego">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
function return_bytes($val)
{
	$val = trim($val);
	$last = strtolower($val[strlen($val) - 1]);
	$val = (int)trim($val);
	switch ($last) {
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return $val;
}

function max_file_upload_in_bytes()
{
	//select maximum upload size
	$max_upload = return_bytes(ini_get('upload_max_filesize'));
	//select post limit
	$max_post = return_bytes(ini_get('post_max_size'));
	//select memory limit
	$memory_limit = return_bytes(ini_get('memory_limit'));
	// return the smallest of them, this defines the real limit
	return min($max_upload, $max_post, $memory_limit);
}
