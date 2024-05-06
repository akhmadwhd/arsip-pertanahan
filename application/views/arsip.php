<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Detail Arsip</h2>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/home/search'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
		<a class="btn btn-primary btn-sm float-end" href="<?= site_url('/admin/vedit/' . encrypt_url($id)); ?>"><i class="fa fa-pencil"></i> Edit Arsip</a>
	</div>
	<div class="card-body">
		<!-- Form Name -->
		<div class="row">
			<div class="col-md-5">
				<!-- 1st column -->
				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="noarsip">No KTP Pemilik</label>
					<label class="col-md-8 isi">: <?= $noarsip; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="tanggal">Tanggal</label>
					<label class="col-md-8 isi">: <?= date_indo($tanggal, 'd F Y');
													?>
					</label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="pencipta">Kategori Arsip</label>
					<label class="col-md-8 isi">: <?= $nama_pencipta; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="unitpengolah">Unit Pengolah</label>
					<label class="col-md-8 isi">: <?= $nama_pengolah; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="kode">Kode Klasifikasi</label>
					<label class="col-md-8 isi">: <?= $nama_kode . " - " . $nama; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="uraian">Uraian</label>
					<label class="col-md-8 isi">: <?= $uraian; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="lokasi">Lokasi Tanah</label>
					<label class="col-md-8 isi">: <?= $nama_lokasi; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="media">Jenis Media</label>
					<label class="col-md-8 isi">: <?= $nama_media; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="ket">Keterangan Keaslian</label>
					<label class="col-md-8 isi">: <?= strtoupper($ket); ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="jumlah">Nomor Sertifikat</label>
					<label class="col-md-8 isi">: <?= $jumlah; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="nobox">Luas Lahan</label>
					<label class="col-md-8 isi">: <?= $nobox; ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="nobox">File</label>
					<label class="col-md-8 isi">: <?= ($file == "" ? "" : "<a href='" . base_url('files/' . $file) . "' target='_blank'>" . $file . "</a>"); ?></label>
				</div>

				<div class="mb-3 row">
					<label class="col-md-4 control-label" for="nobox">Nama penginput</label>
					<label class="col-md-8 isi">: <span class="badge badge-primary"><i class="fa fa-user"></i> <?= $username; ?></span></label>
				</div>

			</div><!-- /1st column -->

			<div class="col-md-7">
				<!-- 2nd column -->
				<h4>File Preview</h4>
				<?php
				$pdfFormat = array("pdf", "PDF");
				$imgFormats = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF", "tiff", "TIFF", "svg", "SVG");
				if (isset($file) && in_array(pathinfo($file, PATHINFO_EXTENSION), $pdfFormat)) { ?>
					<iframe id="pdf-js-viewer" src="<?= base_url() ?>/vendor/pdfjs/web/viewer.html?file=<?= base_url('files/' . $file); ?>" title="webviewer" width="100%" frameborder="0" scrolling="yes" style="display:block; width:100%; height:80vh;"></iframe>
				<?php } elseif (isset($file) && in_array(pathinfo($file, PATHINFO_EXTENSION), $imgFormats)) { ?>
					<img src="<?= base_url('files/') . $file; ?>" class="img-fluid" alt="<?= $file ?>" width="100%" />
				<?php } else { ?>
					<h5>Tidak ada pratinjau</h5>
				<?php } ?>
				<br />
				<div class="alert alert-warning text-dark" role="alert">
					<strong>Informasi</strong> Dokumen Preview tidak tampil? Non-aktifkan IDM Extension di Browser.
				</div>
			</div><!-- /2nd column -->
		</div><!-- /.row -->

	</div><!-- card-body -->
</div>
