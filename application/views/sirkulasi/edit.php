<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h2 class="mb-3">Edit Peminjaman</h2>

<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/sirkulasi'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
	</div>
	<div class="card-body">
		<form class="form-horizontal" data-toggle="validator" action="<?= site_url('/sirkulasi/update'); ?>" method="post" enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?= $id; ?>">
			<div class="form-group">
				<label class="control-label" for="noarsip">Nomor Arsip</label>
				<input type="text" value="<?= $noarsip ?>" id="snoarsip" name="noarsip" class="form-control disabled xhr" placeholder="Ketikan 3 huruf/angka pertama kode arsip atau klasifikasi arsip" data-xhr="<?= site_url('/sirkulasi/xhr_arsip'); ?>" autocomplete="off" readonly required />
			</div>

			<div class="form-group">
				<label class="control-label" for="username_peminjam">Username Peminjam</label>
				<select class="form-control select2" name="username_peminjam">
					<option></option>
					<?php foreach ($data_user as $row) { ?>
						<option value="<?= $row['username']; ?>" <?= $row['username'] == $username_peminjam ? "selected" : ""; ?>><?= $row['username']; ?> - <?= $row['nama']; ?></option>
					<?php } ?>
				</select>
				<!-- <input type="text" value="<?= $username_peminjam ?>" id="username_peminjam" name="username_peminjam" class="form-control xhr" placeholder="Ketikan 3 huruf pertama username yang akan meminjam" data-xhr="<?= site_url('/sirkulasi/xhr_user'); ?>" autocomplete="off" required /> -->
			</div>

			<div class="form-group">
				<label class="control-label" for="keperluan">Alasan keperluan peminjaman</label>
				<textarea id="keperluan" name="keperluan" class="form-control" row="3" required><?= $keperluan; ?></textarea>
			</div>

			<div class="form-group">
				<label class="control-label" for="tgl_pinjam">Tanggal Peminjaman</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="height: 50px;"><i class="mdi mdi-calendar text-secondary"></i></span>
					</div>
					<input id="tgl_pinjam" name="tgl_pinjam" class="form-control input-md" type="text" value="<?= $tgl_pinjam; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label" for="tgl_haruskembali">Tanggal Harus Kembali</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="height: 50px;"><i class="mdi mdi-calendar text-secondary"></i></span>
					</div>
					<input id="tgl_haruskembali" name="tgl_haruskembali" class="form-control" value="<?= $tgl_haruskembali; ?>" type="text" required>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn bg-primary btn-lg text-white"><i class="fa fa-save"></i> Simpan</button>
			</div>

		</form>
	</div>
</div>