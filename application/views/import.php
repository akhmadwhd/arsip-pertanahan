<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-md-8">
		<h2>Import Data</h2>
	</div>
	<div class="col-md-4">
		<div class="float-end">
		<a href="<?= site_url('/home/dl') ?>" class="btn bg-primary btn-sm text-white me-2"><i class="fa fa-download"></i> Export Data</a>&nbsp;
		<a href="<?= base_url('/assets/template_import.xlsx') ?>" class="btn btn-success btn-sm text-white"><i class="fa fa-file-excel"></i> File Template</a>
	</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<a href="<?= base_url('/home'); ?>" class="btn btn-sm">
			<i class="fa fa-arrow-left"></i>&ensp;Kembali
		</a>
	</div>

	<div class="card-body">
		<!--<?php
			//if ($this->session->flashdata('zz')) {
			//echo '<div class="alert alert-danger" role="alert">' . $this->session->flashdata('zz') . '</div>';
			//}
			?>-->

		<form id="import_data" action="<?= site_url('/admin/importdata') ?>" enctype="multipart/form-data" class="form-horizontal" method="post" role="form">
			<div class="form-group">
				<label for="up_file">Choose File:</label>
				<input type="file" class="form-control" name="up_file" id="up_file" required />
			</div>
			<br />
			<div class="form-group">
				<input type="submit" value="Upload" class="btn bg-primary btn-lg text-white submit" />
			</div>
		</form>

	</div>
</div>