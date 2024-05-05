<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Entri Arsip Baru</h2>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/home/search'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
	</div>

	<div class="card-body">
		<form id="entriForm" class="form-horizontal" action="<?= site_url('/admin/gentr'); ?>" method="post" enctype="multipart/form-data">
			<!-- Form Name -->
			<div class="row">
				<div class="col-md-6">
					<!-- 1st column -->
					<div class="form-group">
						<label for="noarsip">Nomor KTP Pemilik</label>
						<input id="noarsip" name="noarsip" class="form-control" type="text"  required>

					</div>

					<div class="form-group">
						<label for="nama_dokumen">Nama Pemilik</label>
						<input id="nama_dokumen" name="nama_dokumen" class="form-control" type="text" required>
					</div>

					<div class="form-group">
						<label for="tanggal">Tanggal Penciptaan</label>
						<input id="tanggal" name="tanggal" class="form-control" type="text" placeholder="yyyy-mm-dd" autocomplete="off" required>
					</div>

					<div class="form-group">
						<label for="pencipta">Kategori Arsip</label>
						<select id="pencipta" name="pencipta" class="form-select">
							<option value="">Pilih</option>
							<?php
							if (isset($pencipta)) {
								foreach ($pencipta as $k) {
									echo "<option value='" . $k['id'] . "' >" . $k['nama_pencipta'] . "</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="unitpengolah">Unit Pengolah</label>
						<select id="unitpengolah" name="unitpengolah" class="form-select input-md">
							<option value="">Pilih</option>
							<?php
							if (isset($unitpengolah)) {
								foreach ($unitpengolah as $k) {
									echo "<option value='" . $k['id'] . "' >" . $k['nama_pengolah'] . "</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="kode">Kode Klasifikasi</label>
						<select id="kode" name="kode" class="form-select">
							<option value="">Pilih</option>
							<?php
							if (isset($kode)) {
								foreach ($kode as $k) {
									echo "<option value='" . $k['id'] . "' >" . $k['nama'] . " - " . $k['kode'] . "</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="uraian">Uraian</label>
						<textarea id="uraian" name="uraian" class="form-control" rows="5"></textarea>
					</div>

				</div><!-- /1st column -->

				<div class="col-md-6">
					<!-- 2nd column -->
					<div class="form-group">
						<label for="lokasi">Lokasi Tanah</label>
						<select id="lokasi" name="lokasi" class="form-select">
							<option value="">Pilih</option>
							<?php
							if (isset($lokasi)) {
								foreach ($lokasi as $k) {
									echo "<option value='" . $k['id'] . "' >" . $k['nama_lokasi'] . "</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="media">Jenis Media</label>
						<select id="media" name="media" class="form-select">
							<option value="">Pilih</option>
							<?php
							if (isset($media)) {
								foreach ($media as $k) {
									echo "<option value='" . $k['id'] . "' >" . $k['nama_media'] . "</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="ket">Keterangan Keaslian</label>
						<select class="form-select" name="ket" id="ket">
							<option value="asli" selected="selected">Asli</option>
							<option value="copy">Copy</option>
						</select>
					</div>

					<div class="form-group">
						<label for="jumlah">Nomor Sertifikat</label>
						<input id="jumlah" name="jumlah" class="form-control" type="text">
					</div>

					<div class="form-group">
						<label for="nobox">Luas Lahan</label>
						<input id="nobox" name="nobox" class="form-control" type="text">
					</div>

					<div class="form-group">
						<label for="nobox">File</label>
						<input type="file" name="file" class="dropify" required>
						<small class="form-text text-muted">Ukuran Maksimal <?= number_format(ceil(max_file_upload_in_bytes() / 1000)); ?> MB</small>
					</div>

				</div><!-- /2nd column -->
			</div><!-- /.row -->

			<div class="form-group">
				<button type="submit" class="btn bg-primary btn-lg text-white"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>

	</div><!-- card body -->
</div> <!-- card -->

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
