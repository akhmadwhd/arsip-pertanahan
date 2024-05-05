<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Pengaturan Situs</h2>
		<?php if (isset($_SESSION['akses_modul']['pengaturan']) && $_SESSION['akses_modul']['pengaturan'] == 'on') : ?>

		<?php endif; ?>
	</div>
</div>

<div class="card">

	<div class="card-body">
		<form id="Form" class="form-horizontal" data-toggle="validator" action="<?= site_url('/pengaturan/edit'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" value="<?= $setting->id_pengaturan ?>">
			<div class="form-group">
				<label class="control-label" for="site_title">Site Title</label>
				<div class="">
					<input type="text" class="form-control" id="site_title" name="site_title" value="<?= $setting->site_title ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label" for="site_nama">Nama</label>
				<div class="">
					<input type="text" class="form-control" id="site_nama" name="site_nama" value="<?= $setting->site_nama ?>" />
				</div>
			</div>

			<div class="form-group">
					<label class="control-label" for="background">Background</label><br />

					<div class="row">
						<div class="col-md-8">
							<input type="file" name="background" class="dropify" required>
							<small class="form-text text-muted">Ukuran Maksimal <?= number_format(ceil(max_file_upload_in_bytes() / 1000)); ?> MB</small>
						</div>
						<div class="col-md-4">
							<img class="mb-3" src="<?= site_url('assets/images/') . $setting->site_background ?>" width="200">
						</div>
					</div>

				</div>

			<button type="submit" class="btn bg-primary text-white">Simpan</button>
		</form>
	</div>
</div>

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