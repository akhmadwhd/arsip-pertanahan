<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-3">
	<div class="col-12">
		<div class="page-header">
			<h2>Data Peminjaman (<?= number_format($jml); ?>) &nbsp;
				<?php if (isset($_SESSION['akses_modul']['sirkulasi']) && $_SESSION['akses_modul']['sirkulasi'] == 'on') : ?>
					<a class="btn bg-primary text-white" href="<?= site_url('/sirkulasi/entri'); ?>"><i class="fa fa-plus"></i> Peminjaman Baru</a>
				<?php endif; ?>
			</h2>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<?php
		if ($this->session->flashdata('zz')) {
			echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('zz') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button></div>';
		}
		?>
		<!-- Page Features -->
		<div class="table-responsive">
			<table class="table table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No Arsip</th>
						<th>Peminjam</th>
						<th>Keperluan</th>
						<th>Tgl. Pinjam</th>
						<th>Tgl. Harus Kembali</th>
						<th>Tgl. Pengembalian</th>
						<?php if (isset($admin) && $admin && isset($_SESSION['akses_modul']['sirkulasi']) && $_SESSION['akses_modul']['sirkulasi'] == 'on') : ?>
							<th class="width-sm"></th>
							<th class="width-sm"></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data as $a) {
						echo "<tr>";
						echo "<td>" . $a['noarsip'] . "</td>";
						echo "<td>" . $a['username_peminjam'] . "</td>";
						echo "<td>" . $a['keperluan'] . "</td>";
						echo "<td>" . $a['tgl_pinjam'] . "</td>";
						echo "<td>" . $a['tgl_haruskembali'] . "</td>";
						echo "<td>";
						// hanya user admin bisa mengubah data sirkulasi
						if (isset($admin) && $admin && isset($_SESSION['akses_modul']['sirkulasi']) && $_SESSION['akses_modul']['sirkulasi'] == 'on') {
							if ($a['tgl_pengembalian'] == null) {
								echo "<a href='#' id='" . $a['id'] . "' data-bs-toggle=\"modal\" data-bs-target=\"#arsipkembali\" class='btn btn-info btn-sm text-white kemdata'><i class=\"mdi mdi-checkbox-marked-circle-outline\"></i> Kembalikan</a>";
							} else {
								echo $a['tgl_pengembalian'];
							}
							echo "</td>";
							echo "<td align=\"center\">";
							echo "<a class=\"text-primary\" href='" . site_url('/sirkulasi/vedit/' . $a['id']) . "'><span class='fa fa-edit fa-lg' aria-hidden='true'></span></a>";
							echo "</td>";
							echo "<td align=\"center\">";
							echo "<a class='sdeldata text-danger' id='" . $a['id'] . "' href='#' data-bs-toggle=\"modal\" data-bs-target=\"#deldata\"><i class=\"fa fa-trash fa-lg\"></i></a>";
						}
						echo "</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div> <!-- table repsonsive -->
		<div class="mt-2">
			<?= $pages; ?>
		</div>
	</div>
</div>
<!-- /.row -->

<div class="modal fade" id="deldata">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fsdeldata" class="form-horizontal" role="form" method="post" action="<?= site_url("/sirkulasi/del"); ?>">
					<h4 class="modal-title">Apakah anda yakin ingin Hapus Data ini?</h4>
					<input type="hidden" name="id" id="deliddata" value="">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" id="sdeldatago">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.pengembalian arsip -->
<div class="modal fade" id="arsipkembali">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Kembalikan Arsip</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fkemarsip" class="form-horizontal" role="form" method="post" action="<?= site_url("/sirkulasi/kembalikan"); ?>">
					<h4 class="modal-title">Kembalikan arsip ini?</h4>
					<input type="hidden" name="id" id="kemid" value="">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" id="kemarsipgo">Kembalikan</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->