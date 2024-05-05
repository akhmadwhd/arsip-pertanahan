<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h2 class="mb-3">Tambah Peminjaman</h2>

<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/sirkulasi'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
	</div>
	<div class="card-body">

		<form id="Form" class="form-horizontal" data-toggle="validator" action="<?= site_url('/sirkulasi/gentr'); ?>" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label class="control-label" for="noarsip">Nomor Arsip</label>
				<?php if ($this->config->item('select2_use_ajax') == FALSE) { ?>
					<select class="form-control select2" name="noarsip">
						<option></option>
						<?php foreach ($data_arsip as $row) { ?>
							<option value="<?= $row['noarsip']; ?>"><?= $row['noarsip']; ?> - <?= $row['nama_dokumen']; ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<select name="noarsip" class="form-control select2-arsip"></select>
				<?php } ?>
				<!-- <input type="text" id="snoarsip" name="noarsip" class="form-control xhr" placeholder="Ketikan 3 huruf/angka pertama kode arsip atau klasifikasi arsip" data-xhr="<?= site_url('/sirkulasi/xhr_arsip'); ?>" autocomplete="off" required /> -->
			</div>

			<div class="form-group">
				<label class=" control-label" for="username_peminjam">Username Peminjam</label>
				<?php if ($this->config->item('select2_use_ajax') == FALSE) { ?>
					<select class="form-control select2" name="username_peminjam">
						<option></option>
						<?php foreach ($data_user as $row) { ?>
							<option value="<?= $row['username']; ?>"><?= $row['username']; ?> - <?= $row['nama']; ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<select name="username_peminjam" class="form-control select2-user"></select>
				<?php } ?>
				<!-- <input type="text" id="username_peminjam" name="username_peminjam" class="form-control xhr" placeholder="Ketikan 3 huruf pertama username yang akan meminjam" data-xhr="<?= site_url('/sirkulasi/xhr_user'); ?>" autocomplete="off" required /> -->
			</div>

			<div class="form-group">
				<label class="control-label" for="keperluan">Alasan keperluan peminjaman</label>
				<textarea id="keperluan" name="keperluan" class="form-control" row="3" required></textarea>
			</div>

			<div class="form-group">
				<label class="control-label" for="tgl_pinjam">Tanggal Peminjaman</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="height: 50px;"><i class="mdi mdi-calendar text-secondary"></i></span>
					</div>
					<input id="tgl_pinjam" name="tgl_pinjam" class="form-control" type="text" value="<?= $now ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label" for="tgl_haruskembali">Tanggal Harus Kembali</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="height: 50px;"><i class="mdi mdi-calendar text-secondary"></i></span>
					</div>
					<input id="tgl_haruskembali" name="tgl_haruskembali" class="form-control" type="text" required>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn bg-primary btn-lg text-white"><i class="fa fa-save"></i> Simpan</button>
			</div>

		</form>
	</div>
</div>